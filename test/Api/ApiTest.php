<?php
namespace RCCFicoScore\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

use \RCCFicoScore\Client\Api\RCCFicoScoreApi;
use \RCCFicoScore\Client\ApiException;
use \RCCFicoScore\Client\Configuration;
use RCCFicoScore\Client\Model\CatalogoEstados;
use RCCFicoScore\Client\Model\PersonaPeticion;
use RCCFicoScore\Client\Model\DomicilioPeticion;

use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

class RCCFicoScoreApiTest extends \PHPUnit_Framework_TestCase
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
        
        $this->apiInstance = new RCCFicoScoreApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";
         
    }

    public function testGetReporte()
    {
        $estado = new CatalogoEstados();
        $request = new PersonaPeticion();
        $domicilio = new DomicilioPeticion();

        $request->setApellidoPaterno("PATERNO");
        $request->setApellidoMaterno("MATERNO");
        $request->setApellidoAdicional(null);
        $request->setPrimerNombre("PRIMERNOMBRE");
        $request->setSegundoNombre(null);
        $request->setFechaNacimiento("1952-05-13");
        $request->setRfc("PAMP010101");
        $request->setCurp(null);
        $request->setNacionalidad(null);
        $request->setResidencia(null);
        $request->setEstadoCivil(null);
        $request->setSexo(null);
        $request->setClaveElectorIfe(null);
        $request->setNumeroDependientes(null);
        $request->setFechaDefuncion(null);

        $domicilio->setDireccion("HIDALGO 32");
        $domicilio->setColoniaPoblacion(null);
        $domicilio->setDelegacionMunicipio("LA BARCA");
        $domicilio->setCiudad("BENITO JUAREZ");
        $domicilio->setEstado($estado::JAL);
        $domicilio->setCp("44190");
        $domicilio->setFechaResidencia(null);
        $domicilio->setNumeroTelefono(null);
        $domicilio->setTipoDomicilio(null);
        $domicilio->setTipoAsentamiento(null);
        $request->setDomicilio($domicilio);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username, $this->password, $request);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);
            return $result->getFolioConsulta();
        } catch (ApiException $e) {
            echo 'Exception when calling RCCFicoScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }




}
