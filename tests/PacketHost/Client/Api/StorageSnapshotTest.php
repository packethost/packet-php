<?php namespace Test\PacketHost\Client\Api;

class StorageSnapshotTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\StorageSnapshot::class);

        $this->AssertNotNull($this->api);
    }

    public function testCreate()
    {
        $snapshots = [];

        $this->mock->shouldReceive('post')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c/snapshots/', $snapshots, array())
            ->andReturn($snapshots)
            ->once();

        $response = $this->api->create('b79c99da-b46f-4dba-a143-804861dc676c', $snapshots);

        $this->assertEquals(new \PacketHost\Client\Domain\Snapshot(), $response);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c/snapshots/', array())
            ->andReturn((object)array("snapshots"=>[]))
            ->once();
        
        $response = $this->api->getAll('b79c99da-b46f-4dba-a143-804861dc676c');

        $this->assertEquals([], $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c/snapshots/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
