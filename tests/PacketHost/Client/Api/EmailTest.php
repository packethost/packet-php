<?php namespace Test\PacketHost\Client\Api;

class EmailTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {

        parent::__construct(\PacketHost\Client\Api\Email::class);

        $this->AssertNotNull($this->api);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('emails/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(new \PacketHost\Client\Domain\Email(array()), $response);
    }

    public function testCreate()
    {
        $email = array(
            'address' => 'test@packet.net'
        );

        $this->mock->shouldReceive('post')
            ->with('emails/', $email, array())
            ->andReturn($email)
            ->once();

        $response = $this->api->create($email);

        $this->assertEquals(new \PacketHost\Client\Domain\Email($email), $response);
    }

    public function testUpdate()
    {
        $email = array(
            'id' => '46e6983f-5c01-4062-88aa-edeb02fcf66c',
            'address' => 'test@packet.net'
        );

        $this->mock->shouldReceive('patch')
            ->with('emails/46e6983f-5c01-4062-88aa-edeb02fcf66c', $email, array())
            ->andReturn($email)
            ->once();

        $response = $this->api->update('46e6983f-5c01-4062-88aa-edeb02fcf66c', $email);

        $this->assertEquals(new \PacketHost\Client\Domain\Email($email), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('emails/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
