<?php namespace Test\PacketHost\Client\Api;

class OperatingSystemTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\OperatingSystem::class);

        $this->AssertNotNull($this->api);
    }


    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('operating-systems/', array())
            ->andReturn((object)array("operating_systems"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }
}
