<?php namespace Test\PacketHost\Client\Api;

class ProjectEventTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectEvent::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/events/', array())
            ->andReturn((object)array("events"=>[]))
            ->once();
        
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/events/1140617d-262d-4502-a3d6-771d83c930da', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '1140617d-262d-4502-a3d6-771d83c930da');

        $this->assertEquals(new \PacketHost\Client\Domain\Event(array()), $response);
    }

}
