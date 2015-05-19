<?php namespace Test\PacketHost\Client\Api;

class UserTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\User::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('users/', array())
            ->andReturn((object)array("users"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('users/2584c187-2f1f-4475-8a1e-fe068742fb26', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('2584c187-2f1f-4475-8a1e-fe068742fb26');

        $this->assertEquals(new \PacketHost\Client\Domain\User(array()), $response);
    }

    public function testUpdate()
    {
        $user = array(
            'id' => '2584c187-2f1f-4475-8a1e-fe068742fb26',
            'email' => 'test@packet.net',
            'firstName' => 'TestName',
            'lastName' => 'TestData'
        );

        $this->mock->shouldReceive('patch')
            ->with('users/2584c187-2f1f-4475-8a1e-fe068742fb26', $user, array())
            ->andReturn($user)
            ->once();

        $response = $this->api->update('2584c187-2f1f-4475-8a1e-fe068742fb26', $user);

        $this->assertEquals(new \PacketHost\Client\Domain\User($user), $response);
    }
}
