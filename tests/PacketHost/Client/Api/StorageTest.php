<?php namespace Test\PacketHost\Client\Api;

class StorageTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Storage::class);

        $this->AssertNotNull($this->api);
    }

    public function testCreate()
    {
        $volume = [];

        $this->mock->shouldReceive('post')
            ->with('storage/', $volume, array())
            ->andReturn($volume)
            ->once();

        $response = $this->api->create($volume);

        $this->assertEquals(new \PacketHost\Client\Domain\Volume(), $response);
    }

    public function testUpdate()
    {
        $this->mock->shouldReceive('patch')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c', array(), array())
            ->andReturn([])
            ->once();
        
        $response = $this->api->update('b79c99da-b46f-4dba-a143-804861dc676c', []);

        $this->assertEquals(new \PacketHost\Client\Domain\Volume(), $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c', array())
            ->andReturn([])
            ->once();
        
        $response = $this->api->get('b79c99da-b46f-4dba-a143-804861dc676c');

        $this->assertEquals(new \PacketHost\Client\Domain\Volume(), $response);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('storage/', array())
            ->andReturn((object)array("volumes"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('b79c99da-b46f-4dba-a143-804861dc676c');

        $this->assertEquals(array(), $response);
    }
}
