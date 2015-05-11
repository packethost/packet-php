<?php namespace Test\PacketHost\Client\Api;

class PlanTest extends BaseTest
{
    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Plan::class);

        $this->AssertNotNull($this->api);
    }


    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('plans/', array())
            ->andReturn((object)array("plans"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }
}
