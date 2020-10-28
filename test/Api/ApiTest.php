<?php

namespace Vantage\MX\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \Vantage\MX\Client\Configuration;
use \Vantage\MX\Client\Model\AportantesPeticion;
use \Vantage\MX\Client\Model\NoAportantesPeticion;
use \Vantage\MX\Client\Api\VantAgeApi as Instance;
use \Vantage\MX\Client\Model\CatalogoContrato;
use \Vantage\MX\Client\Model\CatalogoFrecuenciaPago;
use \Vantage\MX\Client\Model\PersonaPeticion;
use \Vantage\MX\Client\Model\DomicilioPeticion;
use \Vantage\MX\Client\Model\CatalogoEstados;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new KeyHandler(null, null, $password);

        $events = new MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new Client(['handler' => $handler]);

        $config = new Configuration();
        $config->setHost('the_url');
        $this->apiInstance = new Instance($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";    
    }    

    public function testGetVantageAportantes(){
        try {
            $request = new AportantesPeticion();
            $tipoContrato = new CatalogoContrato();

            $request->setFolio("0000001");
            $request->setTipoContrato($tipoContrato::TC);
            $request->setNumeroCuenta("4772133042201399");
            $request->setDiasAtraso(1);
            $result = $this->apiInstance->getVantageAportantes($this->x_api_key, $this->username, $this->password, $request);

            if($this->apiInstance->getStatusCode() == 200){
                print_r($result);
            }
        } catch (ApiException $e) {

            if($e->getCode() !== 204){
                echo 'Exception when calling ApiTest->testGetVantageAportantes: ', $e->getMessage(), PHP_EOL;
            }
        }
        $this->assertTrue($this->apiInstance->getStatusCode() == 200);        
    }

    public function testGetVantageNoAportantes(){
        try {
            $tipoContrato = new CatalogoContrato();
            $catalogoPago = new CatalogoFrecuenciaPago();
            $persona = new PersonaPeticion();
            $domicilio = new DomicilioPeticion();
            $catalogoEstados = new CatalogoEstados();
            $request = new NoAportantesPeticion();
            
            $domicilio->setDireccion("INSURGENTES SUR 1007");
            $domicilio->setColoniaPoblacion("INSURGENTES");
            $domicilio->setDelegacionMunicipio("BENITO JUAREZ");
            $domicilio->setCiudad("CIUDAD DE MÉXICO");
            $domicilio->setEstado($catalogoEstados::DF);
            $domicilio->setCp("11230");

            $persona->setPrimerNombre("JUAN");
            $persona->setApellidoPaterno("PRUEBA");
            $persona->setApellidoMaterno("SIETE");
            $persona->setFechaNacimiento("1980-01-07");
            $persona->setDomicilio($domicilio);

            $request->setFolio("0000002");
            $request->setTipoProducto("O");
            $request->setTipoContrato($tipoContrato::TC);
            $request->setFrecuenciaPago($catalogoPago::M);
            $request->setDiasAtraso(1);
            $request->setNumeroCuenta("123456");
            $request->setFechaApertura("1990-10-19");
            $request->setSaldoActual(15301);
            $request->setPersona($persona);

            $result = $this->apiInstance->getVantageNoAportantes($this->x_api_key, $this->username, $this->password, $request);

            if($this->apiInstance->getStatusCode() == 200){
                print_r($result);
            }
        } catch (ApiException $e) {

            if($e->getCode() !== 204){
                echo 'Exception when calling ApiTest->testGetVantageNoAportantes: ', $e->getMessage(), PHP_EOL;
            }
        }
        $this->assertTrue($this->apiInstance->getStatusCode() == 200);         
    }
        
}
