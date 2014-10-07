<?php namespace PacketHost\Client\Api\Interfaces;

interface InvitationInterface {
    
    public function get( $projectId, $id, $options = "");

    public function create( $projectId, $data, $options = "");

    public function delete( $projectId, $id, $options = "" );

    public function update( $projectId, $id, $data, $options = "" );
    
}

