<?php namespace Test\PacketHost\Client;

class PacketHostClientTest extends \PHPUnit_Framework_TestCase{

    public function __construct(){
    }

    protected function setUp(){
        parent::setUp();
    }

    protected function tearDown(){
        parent::tearDown();
    }

    public function testGetProjects(){

        $projectApi = new \PacketHost\Client\Api\Project( new \PacketHost\Client\Adapter\GuzzleAdapter() );

        $projects = $projectApi->getAll();

        $this->assertEquals(1, count($projects));
    }

}