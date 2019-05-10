<?php
/**
 * Vantage
 */

namespace APIHub\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack;

use \APIHub\Client\ApiException;
use \APIHub\Client\Interceptor\KeyHandler;
use \APIHub\Client\Interceptor\MiddlewareEvents;

class SegmentadorApiTest extends \PHPUnit_Framework_TestCase
{
    protected $apiInstance;
    protected $signer;

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \APIHub\Client\Interceptor\KeyHandler(null, null, $password);
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = \GuzzleHttp\HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new \GuzzleHttp\Client([
            'handler' => $handler
        ]);
        $this->apiInstance = new \APIHub\Client\Api\SegmentadorApi($client);
    }

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
}
