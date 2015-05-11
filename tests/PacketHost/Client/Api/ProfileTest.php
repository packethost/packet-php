<?php namespace Test\PacketHost\Client\Api;

class ProfileTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Profile::class);

        $this->AssertNotNull($this->api);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('user',[])
            ->andReturn([])
            ->once();

        $response = $this->api->get();

        $this->assertEquals(new \PacketHost\Client\Domain\User([]), $response);
    }

    public function testUpdate()
    {

        $user = [
            'id' => '2584c187-2f1f-4475-8a1e-fe068742fb26',
            'email' => 'test@packet.net',
            'firstName' => 'TestName',
            'lastName' => 'TestData'
        ];

        $this->mock->shouldReceive('patch')
            ->with('user', $user, [])
            ->andReturn($user)
            ->once();

        $response = $this->api->update($user);
        
        $user = new \PacketHost\Client\Domain\User($user);
        $this->assertEquals($user->id, $response->id);
        $this->assertEquals($user->email, $response->email);
        $this->assertEquals($user->firstName, $response->firstName);
        $this->assertEquals($user->lastName, $response->lastName);
    }
}
