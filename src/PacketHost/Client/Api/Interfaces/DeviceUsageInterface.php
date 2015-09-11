<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceUsageInterface
{
    
    public function getAll($deviceId, $options = '');
}
