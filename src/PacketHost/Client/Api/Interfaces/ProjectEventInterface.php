<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectEventInterface
{
    
    public function getAll($projectId, $options = []);
}
