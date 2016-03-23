<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectUsageInterface
{
    
    public function getAll($projectId, $options = '');
}
