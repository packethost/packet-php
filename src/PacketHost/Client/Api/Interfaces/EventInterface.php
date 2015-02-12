<?php namespace PacketHost\Client\Api\Interfaces;

interface EventInterface
{
    
    public function getAll($options = "");

    public function get($id, $options = "");
}
