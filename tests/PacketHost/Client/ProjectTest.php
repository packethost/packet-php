<?php namespace Test\PacketHost\Client;

class PacketHostClientTest extends BaseTest{

    
    private $projectApi = null;

      
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
    public function testDelete( $id ){

        $result = $this->getProjectApi()->delete( $id );

        $this->assertEquals($result, true);
    }

}