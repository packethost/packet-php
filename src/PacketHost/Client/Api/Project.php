<?php namespace PacketHost\Client\Api;

class Project extends BaseApi {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'projects', \PacketHost\Client\Domain\Project::class, 'projects' );
    }
    
}