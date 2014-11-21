<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceInterface {
    
    function getAll( $projectId, $options = []);

    function get( $projectId, $id, $options = []);

    function create( $projectId, $data, $options = []);

    function delete( $projectId, $id, $options = [] );

    function update( $projectId, $id, $data, $options = [] );
    
}