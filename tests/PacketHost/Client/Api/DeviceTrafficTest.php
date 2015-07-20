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

    public function testCreate()
    {
        $trafficRequest = array(
            'timeframe' => array(
                'started_at' => '2015-06-19T17:55:00Z', 
                'ended_at' => '2015-06-19T19:55:00Z'
            ),
            'interval' => 'day',
            'direction' => 'inbound',
            'bucket' => 'external'
        );

        $this->mock->shouldReceive('post')
            ->with('devices/0d434725-3456-4a70-b712-6e1f1112e0fc/traffic/', $trafficRequest, array())
            ->andReturn($trafficRequest)
            ->once();

        $response = $this->api->create('0d434725-3456-4a70-b712-6e1f1112e0fc', $trafficRequest);

        $this->assertEquals(new \PacketHost\Client\Domain\Traffic(), $response);
    }
}
