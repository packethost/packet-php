<?php namespace Test\PacketHost\Client\Api;

class DeviceEventTest extends BaseTest
{
    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\DeviceEvent::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('devices/0d434725-3456-4a70-b712-6e1f1112e0fc/events/', array())
            ->andReturn((object)array("events"=>[]))
            ->once();
        
        $response = $this->api->getAll('0d434725-3456-4a70-b712-6e1f1112e0fc');

        $this->assertEquals([], $response);
    }
}
