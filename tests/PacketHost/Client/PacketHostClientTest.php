<?php namespace Test\PacketHost\Client;

class PacketHostClientTest extends \PHPUnit_Framework_TestCase{

    private $adapter = null;

    public function __construct(){
    }

    protected function setUp(){
        parent::setUp();
    }

    protected function tearDown(){
        parent::tearDown();
    }

    private function getAdapter(){

        if ( ! $this->adapter ){
            $this->adapter = new \PacketHost\Client\Adapter\GuzzleAdapter('3567c799bffa8fd622596d4184f7977f', 'client-php'); 
        }

        return $this->adapter;
    }
    public function testGetProjects(){

        $projectApi = new \PacketHost\Client\Api\Project( $this->getAdapter() );

        $projects = $projectApi->getAll();

        $this->assertGreaterThan(0, count($projects));
    }

    public function testAddProject(){

        $projectApi = new \PacketHost\Client\Api\Project( $this->getAdapter() );

        $project = new \PacketHost\Client\Domain\Project();
        $project->name = 'New project';

        $project = $projectApi->create( $project );

        error_log(print_r( $project,true ));
        $this->assertGreaterThan(0, 1);
    }

}