<?php namespace PacketHost\Client\Api\Interfaces;

interface UserInterface{

    public function getAll( $options = "");

    public function get( $id, $options = "");

    public function create( $data, $options = "");

    public function update( $id, $data, $options = "" );

}