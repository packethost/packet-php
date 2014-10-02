<?php namespace Test\PacketHost\Client;

class ProjectTest extends \Test\PacketHost\Client\BaseTest{
    
    public function __construct(){

        $project = new \PacketHost\Client\Domain\Project();
        $project->name = 'New project';

        parent::__construct(new \PacketHost\Client\Api\Project( $this->getAdapter() ), $project );
    }


}