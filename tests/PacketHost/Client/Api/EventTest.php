<?php namespace Test\PacketHost\Client\Api;

class EventTest extends \Test\PacketHost\Client\Api\BaseTest{

    /**
    * @test
    */
    public function __construct(){

        parent::__construct(\PacketHost\Client\Api\Event::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('events/', array())
            ->andReturn((object)array("events"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('events/28e08193-2ecb-4c0e-a94f-0f1948b45f9e', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('28e08193-2ecb-4c0e-a94f-0f1948b45f9e');

        $this->assertEquals(new \PacketHost\Client\Domain\Event(array()), $response);
    }
}