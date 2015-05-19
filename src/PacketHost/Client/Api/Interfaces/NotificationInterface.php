<?php namespace PacketHost\Client\Api\Interfaces;

interface NotificationInterface
{
    
    public function getAll($options = "");

    public function get($id, $options = "");

    public function update($id, $data, $options = "");
}
