<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceEventInterface
{
    
    public function getAll($deviceId, $options = "");
}
