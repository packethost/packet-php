<?php namespace PacketHost\Client\Api\Interfaces;

interface ApiInterface
{
    
    public function getAll($options = "");

    public function get($id, $options = "");

    public function create($data, $options = "");

    public function delete($id);
}
