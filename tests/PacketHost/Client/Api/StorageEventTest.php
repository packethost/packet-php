<?php namespace Test\PacketHost\Client\Api;

class StorageEventTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\StorageEvent::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('storage/c3de2262-7bb6-450b-840e-cf62f66e9bf0/events/', array())
            ->andReturn((object)array("events"=>[]))
            ->once();
        
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }
}
