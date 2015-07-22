<?php namespace Test\PacketHost\Client\Api;

class DeviceTrafficTest extends \Test\PacketHost\Client\Api\BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\DeviceTraffic::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $request['queryParams'] = 'timeframe[started_at]=2015-06-19T17:55:00Z&timeframe[ended_at]=2015-06-19T19:55:00Z&interval=day&';
        $request['queryParams'] .= 'direction=inbound&bucket=external';

        $this->mock->shouldReceive('get')
            ->with('devices/0d434725-3456-4a70-b712-6e1f1112e0fc/traffic/?'.$request['queryParams'], array())
            ->andReturn((object)array("result"=>[]))
            ->once();
        
        $response = $this->api->getAll('0d434725-3456-4a70-b712-6e1f1112e0fc', $request);

        $this->assertEquals([], $response);
    }
}
