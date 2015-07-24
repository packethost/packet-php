<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceTrafficInterface
{
    
    public function getAll($deviceId, $options = '');
}
