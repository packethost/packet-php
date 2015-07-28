<?php namespace Test\PacketHost\Client\Api;

class DeviceUsageTest extends \Test\PacketHost\Client\Api\BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\DeviceUsage::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $request['queryParams'] = 'since=2015-06-19T17:55:00Z';

        $this->mock->shouldReceive('get')
            ->with('devices/0d434725-3456-4a70-b712-6e1f1112e0fc/usages/?'.$request['queryParams'], array())
            ->andReturn((object)array("usages"=>[]))
            ->once();
        
        $response = $this->api->getAll('0d434725-3456-4a70-b712-6e1f1112e0fc', $request);

        $this->assertEquals([], $response);
    }
}
