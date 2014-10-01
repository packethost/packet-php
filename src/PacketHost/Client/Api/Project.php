<?php namespace PacketHost\Client\Api;

class Project extends BaseApi {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter );
    }

    public function getAll(){

        $projects = $this->adapter->get('projects');

        return $projects;
    }

    public function create( \PacketHost\Client\Domain\Project $project ){
        
    }

}