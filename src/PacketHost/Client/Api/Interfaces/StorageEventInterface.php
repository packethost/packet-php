<?php namespace PacketHost\Client\Api\Interfaces;

interface StorageEventInterface
{
    
    public function getAll($projectId, $options = []);
}
