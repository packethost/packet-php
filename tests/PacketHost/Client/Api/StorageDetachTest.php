<?php namespace Test\PacketHost\Client\Api;

class StorageDetachTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\StorageDetach::class);

        $this->AssertNotNull($this->api);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('storage/attachments/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
