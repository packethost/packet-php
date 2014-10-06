<?php namespace PacketHost\Client\Api\Interfaces;

interface SessionInterface {
    

    public function get( $id, $options = "");

    public function create( $data, $options = "");

    
}