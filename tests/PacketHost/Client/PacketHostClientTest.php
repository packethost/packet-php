<?php namespace Test\PacketHost\Client;

class PacketHostClientTest extends \PHPUnit_Framework_TestCase{

    private $adapter = null;
    private $projectApi = null;

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
            $this->adapter = new \PacketHost\Client\Adapter\GuzzleAdapter('3567c799bffa8fd622596d4184f7977f', '4190f3e7124ceac9c4646aa5b7dad0d562445a5946990238d396e6a354397d60'); 
        }

        return $this->adapter;
    }

    private function getProjectApi(){

        if ( ! $this->projectApi ){
            $this->projectApi = new \PacketHost\Client\Api\Project( $this->getAdapter() );
        }

        return $this->projectApi;
    }


    public function testGetAll(){
 
        $projects = $this->getProjectApi()->getAll();

        // A user must have one or more projects
        $this->assertGreaterThan(0, count($projects));
    }

    public function testCreate(){
        
        $project = new \PacketHost\Client\Domain\Project();
        $project->name = 'New project';

        $project = $this->getProjectApi()->create( $project );
        
        $this->assertEquals('New project', $project->name);

        return $project->id;
    }

    /**
     * Not working yet
     * @depends testCreate
     */
    public function delete( $id ){

        $result = $this->getProjectApi()->delete( $id );

        $this->assertEquals($result, true);
    }

}