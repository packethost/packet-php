<?php namespace Test\PacketHost\Client\Api;

class DeviceTest extends \Test\PacketHost\Client\Api\BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Device::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/0d434725-3456-4a70-b712-6e1f1112e0fc/devices/', array())
            ->andReturn((object)array("devices"=>[]))
            ->once();
        
        $response = $this->api->getAll('0d434725-3456-4a70-b712-6e1f1112e0fc');

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/0d434725-3456-4a70-b712-6e1f1112e0fc/devices/28e08193-2ecb-4c0e-a94f-0f1948b45f9e', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('0d434725-3456-4a70-b712-6e1f1112e0fc', '28e08193-2ecb-4c0e-a94f-0f1948b45f9e');

        $this->assertEquals(new \PacketHost\Client\Domain\Device(array()), $response);
    }

    public function testCreate()
    {
        $device = array(
            'name' => 'Test device'
        );

        $this->mock->shouldReceive('post')
            ->with('projects/0d434725-3456-4a70-b712-6e1f1112e0fc/devices/', $device, array())
            ->andReturn($device)
            ->once();

        $response = $this->api->create('0d434725-3456-4a70-b712-6e1f1112e0fc', $device);

        $this->assertEquals(new \PacketHost\Client\Domain\Device($device), $response);
    }

    public function testUpdate()
    {
        $device = array(
            'id' => '28e08193-2ecb-4c0e-a94f-0f1948b45f9e',
            'name' => 'Test device'
        );

        $this->mock->shouldReceive('patch')
            ->with('projects/0d434725-3456-4a70-b712-6e1f1112e0fc/devices/28e08193-2ecb-4c0e-a94f-0f1948b45f9e', $device, array())
            ->andReturn($device)
            ->once();

        $response = $this->api->update('0d434725-3456-4a70-b712-6e1f1112e0fc', '28e08193-2ecb-4c0e-a94f-0f1948b45f9e', $device);

        $this->assertEquals(new \PacketHost\Client\Domain\Device($device), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('projects/0d434725-3456-4a70-b712-6e1f1112e0fc/devices/28e08193-2ecb-4c0e-a94f-0f1948b45f9e', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('0d434725-3456-4a70-b712-6e1f1112e0fc', '28e08193-2ecb-4c0e-a94f-0f1948b45f9e');

        $this->assertEquals(array(), $response);
    }
}
