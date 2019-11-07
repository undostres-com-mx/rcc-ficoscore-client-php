<?php

namespace RCCFicoScore\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

use \RCCFicoScore\Client\ApiException;
use \RCCFicoScore\Client\Configuration;
use \RCCFicoScore\Client\Model\Error;
use \RCCFicoScore\Client\Interceptor\KeyHandler;
use \RCCFicoScore\Client\Interceptor\MiddlewareEvents;

class ReporteDeCrditoConFicoScoreApiTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \RCCFicoScore\Client\Interceptor\KeyHandler(null, null, $password);
        $events = new \RCCFicoScore\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $config = new \RCCFicoScore\Client\Configuration();
        $config->setHost('the_url');
        $this->apiInstance = new \RCCFicoScore\Client\Api\ReporteDeCrditoConFicoScoreApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";

    }

    public function testGetReporte()
    {
        $request = new \RCCFicoScore\Client\Model\PersonaPeticion();
        $request->setPrimerNombre("XXXXXXXXXX");
        $request->setSegundoNombre(null);
        $request->setApellidoPaterno("XXXXXXXXXX");
        $request->setApellidoMaterno("XXXXXXXXXX");
        $request->setApellidoAdicional(null);
        $request->setFechaNacimiento("YYYY-MM-DD");
        $request->setRfc("XXXXXXXXXX");
        $request->setCurp(null);

        $domicilio = new \RCCFicoScore\Client\Model\Domicilio();
        $domicilio->setDireccion("XXXXXXXXXX");
        $domicilio->setColonia("XXXXXXXXXX");
        $domicilio->setCiudad("XXXXXXXXXX");
        $domicilio->setCodigoPostal("XXXXXXXXXX");
        $domicilio->setMunicipio("XXXXXXXXXX");
        $domicilio->setEstado("XXX");
        $request->setDomicilio($domicilio);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username, $this->password, $request);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
    /**
     * @depends testGetReporte
     */
    public function testGetConsultas($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getConsultas($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getConsultas()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }

    }

    /**
     * @depends testGetReporte
     */
    public function testGetCreditos($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getCreditos($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getCreditos()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetReporte
     */
    public function testGetDomicilios($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getDomicilios($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getDomicilios()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetReporte
     */
    public function testGetEmpleos($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getEmpleos($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getEmpleos()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetReporte
     */
    public function testGetScores($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getScores($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getScores()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
}
