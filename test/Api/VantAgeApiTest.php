<?php

namespace Vantage\MX\Client;

use \Vantage\MX\Client\Configuration;
use \Vantage\MX\Client\ApiException as VantageException;
use \Vantage\MX\Client\Api\Vantage\MXApi;
use \Vantage\MX\Client\Model\AportantesPeticion;
use \Vantage\MX\Client\Model\NoAportantesPeticion;
use \Vantage\MX\Client\Model\CatalogoContrato;
use \Vantage\MX\Client\Model\CatalogoFrecuenciaPago;
use \Vantage\MX\Client\Model\PersonaPeticion;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

class VantAgeApiTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->keypair = 'path/to/keypair.p12';
        $this->cert = 'path/to/certificate.pem';
        $this->url = 'this_url';

        $this->signer = new KeyHandler($this->keypair, $this->cert, $password);
        $events = new MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new Client(['handler' => $handler]);
        $config = new Configuration();
        $config->setHost($this->url);
        
        $this->apiInstance = new VantAgeApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";
    }
    
    public function testGetVantageAportantes(){
        try {
            $request = new AportantesPeticion();
            $request->setFolio("123456");
            $request->setFechaProceso("yyyy-MM-dd");
            $request->setNumeroCuenta("00000000");
            $request->setDiasAtraso(10);
            $result = $this->apiInstance->getVantageAportantes(
                $this->x_api_key, $this->username, $this->password, $request);
            print_r($result);
        } catch (VantageException | Exception $e) {
            echo 'Exception when calling testGetVantageAportantes->getVantageAportantes: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testGetVantageNoAportantes(){
        try {
            $tipoContrato = new CatalogoContrato();
            $catalogoPago = new CatalogoFrecuenciaPago();
            $persona = new PersonaPeticion();
            $request = new NoAportantesPeticion();

            $persona->setPrimerNombre("NOMBRE");
            $persona->setApellidoPaterno("PATERNO");
            $persona->setApellidoMaterno("MATERNO");
            $persona->setFechaNacimiento("1986-06-27");
            $request->setFolio("123456");
            $request->setFechaProceso("yyyy-MM-dd");
            $request->setTipoContrato($tipoContrato::AA);
            $request->setFrecuenciaPago($catalogoPago::N);
            $request->setDiasAtraso(10);
            $request->setPersona($persona);

            $result = $this->apiInstance->getVantageAportantes(
                $this->x_api_key, $this->username, $this->password, $request);
            print_r($result);
        } catch (VantageException | Exception $e) {
            echo 'Exception when calling testGetVantageNoAportantes->getVantageAportantes: ', $e->getMessage(), PHP_EOL;
        }
    }
}
