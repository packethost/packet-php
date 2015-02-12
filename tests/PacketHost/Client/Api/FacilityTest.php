<?php namespace Test\PacketHost\Client\Api;

class FacilityTest extends \Test\PacketHost\Client\Api\BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {

        parent::__construct(\PacketHost\Client\Api\Facility::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('facilities/', array())
            ->andReturn((object)array("facilities"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }
}
