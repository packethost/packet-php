<?php namespace Test\PacketHost\Client\Api;

class DeviceEventTest extends \Test\PacketHost\Client\Api\BaseTest
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

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('devices/0d434725-3456-4a70-b712-6e1f1112e0fc/events/28e08193-2ecb-4c0e-a94f-0f1948b45f9e', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('0d434725-3456-4a70-b712-6e1f1112e0fc', '28e08193-2ecb-4c0e-a94f-0f1948b45f9e');

        $this->assertEquals(new \PacketHost\Client\Domain\Event(array()), $response);
    }
}
