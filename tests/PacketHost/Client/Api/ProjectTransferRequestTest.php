<?php namespace Test\PacketHost\Client\Api;

class ProjectTransferRequestTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectTransferRequest::class);

        $this->AssertNotNull($this->api);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/b79c99da-b46f-4dba-a143-804861dc676c/transfers/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(new \PacketHost\Client\Domain\TransferRequest(array()), $response);
    }

    public function testCreate()
    {
        $transferRequest = array(
            'membership_id' => '11b20e37-cf71-47d7-914e-28146fc32725'
        );

        $this->mock->shouldReceive('post')
            ->with('projects/b79c99da-b46f-4dba-a143-804861dc676c/transfers/', $transferRequest, array())
            ->andReturn($transferRequest)
            ->once();

        $response = $this->api->create('b79c99da-b46f-4dba-a143-804861dc676c', $transferRequest);

        $this->assertEquals(new \PacketHost\Client\Domain\TransferRequest($transferRequest), $response);
    }

    public function testUpdate()
    {
        $transferRequest = array(
            'id' => '46e6983f-5c01-4062-88aa-edeb02fcf66c',
            'label' => 'Test Key'
        );

        $this->mock->shouldReceive('patch')
            ->with('projects/b79c99da-b46f-4dba-a143-804861dc676c/transfers/46e6983f-5c01-4062-88aa-edeb02fcf66c', $transferRequest, array())
            ->andReturn($transferRequest)
            ->once();

        $response = $this->api->update('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c', $transferRequest);

        $this->assertEquals(new \PacketHost\Client\Domain\TransferRequest($transferRequest), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('projects/b79c99da-b46f-4dba-a143-804861dc676c/transfers/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('b79c99da-b46f-4dba-a143-804861dc676c', '46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
