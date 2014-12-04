<?php namespace PacketHost\Client\Api\Interfaces;

interface EmailInterface{

    public function getAll( $options = "");

    public function get( $id, $options = "");

    public function create( $data, $options = "");

    public function update( $id, $data, $options = "" );

    public function delete( $id, $options = "" );
}