<?php namespace PacketHost\Client\Api\Interfaces;

interface OperatingSystemInterface {
    
    public function getAll( $options = []);
    
    public function get( $id, $options = []);

    public function create( $data, $options = []);

    public function delete( $id, $options = [] );

    public function update( $id, $data, $options = [] );
}
