# VANT/AGE-client-php

Es un modelo que segmenta a los clientes morosos en 6 calificaciones, de acuerdo al avance esperado de mora en los siguientes 30 días. Reduce costos de gestión y administración de cartera morosa al segmentar a la población.

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Generar llave y certificado

- Se tiene que tener un contenedor en formato PKCS12.
- En caso de no contar con uno, ejecutar las instrucciones contenidas en **lib/Interceptor/key_pair_gen.sh** ó con los siguientes comandos.
- **opcional**: Para cifrar el contenedor, colocar una contraseña en una variable de ambiente.
```sh
export KEY_PASSWORD=your_password
```
- Definir los nombres de archivos y alias.
```sh
export PRIVATE_KEY_FILE=pri_key.pem
export CERTIFICATE_FILE=certificate.pem
export SUBJECT=/C=MX/ST=MX/L=MX/O=CDC/CN=CDC
export PKCS12_FILE=keypair.p12
export ALIAS=circulo_de_credito
```
- Generar llave y certificado.
```sh
#Genera la llave privada.
openssl ecparam -name secp384r1 -genkey -out ${PRIVATE_KEY_FILE}

#Genera el certificado público.
openssl req -new -x509 -days 365 \
    -key ${PRIVATE_KEY_FILE} \
    -out ${CERTIFICATE_FILE} \
    -subj "${SUBJECT}"
```
- Generar contenedor en formato PKCS12.
```sh
# Genera el archivo pkcs12 a partir de la llave privada y el certificado.
# Deberá empaquetar la llave privada y el certificado.
openssl pkcs12 -name ${ALIAS} \
    -export -out ${PKCS12_FILE} \
    -inkey ${PRIVATE_KEY_FILE} \
    -in ${CERTIFICATE_FILE} -password pass:${KEY_PASSWORD}
```

### Paso 2. Cargar el certificado dentro del portal de desarrolladores

 1. Después de iniciar sesión, hacer clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Certificados para @tuApp**".
 <p align="center">
  <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/applications.png">
 </p>
 4. Al abrir una ventana emergente se deberá cargar el certificado previamente creado y darle clic al botón "**Cargar**", como se muestra en la siguiente imagen.
 <p>
  <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/upload_cert.png" width="268">
 </p>

### Paso 3. Descargar el certificado de Círculo de Crédito dentro del portal de desarrolladores
 1. Después de iniciar sesión, hacer clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Certificados para @tuApp**", y esperar a que cargue una ventana emergente.
 <p align="center">
  <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/applications.png">
 </p>
 4. Al abrir una ventana emergente se deberá dar clic al botón "**Descargar**" como se muestra en la siguiente imagen; el certificado comenzará a descargarse.
 <p>
  <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/download_cert.png" width="268">
 </p>

 > Es importante que este contenedor sea almacenado en la siguiente ruta:
 > **/path/to/repository/lib/Interceptor/keypair.p12**
 >
 > Así mismo el certificado proporcionado por círculo de crédito en la siguiente ruta:
 > **/path/to/repository/lib/Interceptor/cdc_cert.pem**

- En caso de que no se almacene así, se debe especificar la ruta donde se encuentra el contenedor y el certificado. Ver el siguiente ejemplo:

```php
/**
* Esto es parte del setUp() de las pruebas unitarias.
*/
$password = getenv('KEY_PASSWORD');
$this->signer = new \APIHub\Client\Interceptor\KeyHandler(
    "/example/route/keypair.p12",
    "/example/route/cdc_cert.pem",
    $password
);
```
 > **NOTA:** Sólamente en caso de que el contenedor haya cifrado, se debe colocar la contraseña en una variable de ambiente e indicar el nombre de la misma, como se ve en la imagen anterior.

### Paso 4. Modificar URL

 Modificar la URL de la petición en ***lib/Configuration.php*** en la línea 19, como se muestra en el siguiente fragmento de código:

 ```php
 protected $host = 'the_url';
 ```

### Paso 5. Capturar los datos de la petición

Es importante contar con el setUp() que se encargará de firmar y verificar la petición.

```php
<?php
public function setUp()
{
    $password = getenv('KEY_PASSWORD');
    $this->signer = new \APIHub\Client\Interceptor\KeyHandler(null, null, $password);
    $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
    $handler = \GuzzleHttp\HandlerStack::create();
    $handler->push($events->add_signature_header('x-signature'));
    $handler->push($events->verify_signature_header('x-signature'));

    $client = new \GuzzleHttp\Client([
        'handler' => $handler,
        'verify' => false
    ]);
    $this->apiInstance = new \APIHub\Client\Api\SegmentadorApi($client);
}    
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/SegmentadorApiTest.php
*/
public function testVantage()
{
    $x_api_key = "your_api_key";
    $username = "your_username";
    $password = "your_password";
    $body = new \APIHub\Client\Model\Peticion();
    $body->setFolio(0);
    $body->setNumeroCuenta("XXXXXXXX");
    $body->setTipoContrato("XX");
    $body->setTipoCuenta("X");
    $body->setTipoFrecuencia("XX");
    $body->setPeriodosVencidos("0");
    $body->setDiasAtraso(0);
    $body->setSaldo(0);
    $body->setFechaApertura("DD/MM/YYYY");

    try {
        $result = $this->apiInstance->vantage($x_api_key, $username, $password, $body);
        $this->signer->close();
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling SegmentadorApi->vantage: ', $e->getMessage(), PHP_EOL;
    }
}
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
