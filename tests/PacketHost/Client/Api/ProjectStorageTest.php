<?php namespace Test\PacketHost\Client\Api;

class ProjectStorageTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectStorage::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/storage/', array())
            ->andReturn((object)array("volumes"=>[]))
            ->once();
        
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }
}
