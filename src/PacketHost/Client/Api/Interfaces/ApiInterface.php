<?php namespace PacketHost\Client\Api\Interfaces;

interface ApiInterface {
    
    public function getAll();

    public function get( $id );

    public function create( $data );

    public function delete( $id );
    
}