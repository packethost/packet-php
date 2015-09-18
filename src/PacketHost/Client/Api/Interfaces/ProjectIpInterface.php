<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectIpInterface
{
    public function getAll($projectId, $options = []);
    
    public function get($projectId, $id, $options = []);

    public function delete($projectId, $id, $options = []);
}
