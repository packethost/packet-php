<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceTrafficInterface
{
    
    public function create($deviceId, $data, $options = '');
}
