<?php namespace Test\PacketHost\Client\Adapter;

use PacketHost\Client\Adapter\Configuration\DefaultConfiguration;
use PacketHost\Client\Adapter\GuzzleAdapter;

class GuzzleAdapterTest extends \PHPUnit_Framework_TestCase
{
    private function getJsonObj($toObject = false, $associative = false)
    {
        return $toObject ? json_decode('{"name":"Aragorn"}', $associative):'{"name":"Aragorn"}';
    }

    private function getMockResponse()
    {
        $responseMock = \Mockery::mock('\GuzzleHttp\Message\Response');

        $responseMock->shouldReceive('getBody')
            ->once()
            ->andReturn($this->getJsonObj());

        return $responseMock;
    }

    private function getAdapter($clientMock)
    {
        $configuration = new DefaultConfiguration(uniqid(),uniqid(),['value'=>'empty'],['client'=>$clientMock]);
        $adapter = new GuzzleAdapter($configuration);

        return $adapter;
    }

    private function getMockClient()
    {
        return \Mockery::mock('\GuzzleHttp\Client');
    }

    private function execute($action, $obj = null)
    {
        $param = [];
        $clientParam = ['json' => NULL];

        switch($action){
            case "put":
            case "patch":
            case "post":
                $param = $obj ? $obj : $this->getJsonObj();
                $clientParam = ['json' => $obj ? $obj->toArray(): $this->getJsonObj()];
                break;
        }

        $clientMock = $this->getMockClient();
        $clientMock->shouldReceive($action)
            ->with('devices', $clientParam)
            ->once()
            ->andReturn($this->getMockResponse());

        $adapter = $this->getAdapter($clientMock);

        $response = $adapter->{$action}('devices', $param);

        $this->assertEquals($this->getJsonObj(true), $response);
    }

    /**
     * @expectedException PacketHost\Client\Exceptions\RequestExceptions\BaseRequestException
     */
    public function testHandleBadRequest(){

        $clientMock = $this->getMockClient();
        $requestEx = new \GuzzleHttp\Message\Request('GET','/');
        $responseEx = new \GuzzleHttp\Message\Response(400);

        $clientMock->shouldReceive('get')
            ->times(5)
            ->andThrow(new \GuzzleHttp\Exception\RequestException('Error',$requestEx, $responseEx));

        $adapter = $this->getAdapter($clientMock);

        $response = $adapter->get('devices');

    }


    /**
     * @expectedException PacketHost\Client\Exceptions\ResponseExceptions\ClientResponseException
     */
    public function testHandleBadResponses(){

        $clientMock = $this->getMockClient();
        $requestEx = new \GuzzleHttp\Message\Request('GET','/');
        $responseEx = new \GuzzleHttp\Message\Response(400);

        $clientMock->shouldReceive('get')
            ->once()
            ->andThrow(new \GuzzleHttp\Exception\BadResponseException('Error',$requestEx, $responseEx));

        $adapter = $this->getAdapter($clientMock);

        $response = $adapter->get('devices');

    }


    public function testGet()
    {
        $this->execute('get');
    }

    public function testPostWithDomain()
    {
        $device = new \PacketHost\Client\Domain\Device(['hostname' => 'Aragorn']);

        $this->execute('post', $device);
    }

    public function testDelete()
    {
        $this->execute('delete');
    }

    public function testPost()
    {
        $this->execute('post');
    }

    public function testPatch()
    {
        $this->execute('patch');
    }

    public function testPut()
    {
        $this->execute('put');
    }
}
