<?php namespace PacketHost\Client\Api\Interfaces;

interface DeviceIpInterface
{
    
    public function getAll($deviceId, $options = []);
    
    public function get($deviceId, $id, $options = []);

    public function create($deviceId, $data, $options = []);

    public function delete($deviceId, $id, $options = []);

    public function update($deviceId, $id, $data, $options = []);
}
