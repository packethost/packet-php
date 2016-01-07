<?php namespace Test\PacketHost\Client\Api;

class StorageSnapshotPolicyTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\StorageSnapshotPolicy::class);

        $this->AssertNotNull($this->api);
    }

    public function testCreate()
    {
        $snapshotPolicy = [
            'snapshot_count' => 7,
            'snapshot_frequency' => '15min'
        ];


        $this->mock->shouldReceive('post')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c/snapshot-policies/', $snapshotPolicy, array())
            ->andReturn($snapshotPolicy)
            ->once();

        $response = $this->api->create('b79c99da-b46f-4dba-a143-804861dc676c',$snapshotPolicy);

        $this->assertEquals(new \PacketHost\Client\Domain\SnapshotPolicy($snapshotPolicy), $response);
    }

    public function testUpdate()
    {
        $snapshotPolicy = [
            'snapshot_count' => 7,
            'snapshot_frequency' => '15min'
        ];

        $this->mock->shouldReceive('patch')
            ->with('/storage/snapshot-policies/46e6983f-5c01-4062-88aa-edeb02fcf66c', $snapshotPolicy, array())
            ->andReturn($snapshotPolicy)
            ->once();
        
        $response = $this->api->update('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c', $snapshotPolicy);

        $this->assertEquals(new \PacketHost\Client\Domain\SnapshotPolicy($snapshotPolicy), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('/storage/snapshot-policies/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
