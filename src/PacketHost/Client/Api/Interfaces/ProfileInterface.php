<?php namespace PacketHost\Client\Api\Interfaces;

interface ProfileInterface{

    public function get( $options = "");

    public function update( $data, $options = "" );

}