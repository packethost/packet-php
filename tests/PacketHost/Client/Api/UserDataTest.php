<?php namespace Test\PacketHost\Client\Api;

class UserDataTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\UserData::class);

        $this->AssertNotNull($this->api);
    }

    public function testCreate()
    {
        $userData = "My custom userdata";

        $this->mock->shouldReceive('post')
            ->with('userdata/validate', $userData, ['Content-Type'=>'text/plain'])
            ->andReturn(null)
            ->once();

        $response = $this->api->create($userData);

        $this->assertEquals(new \PacketHost\Client\Domain\UserData(), $response);
    }
}
