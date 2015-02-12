<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectInvitationInterface
{
    
    public function getAll($projectId, $options = []);
    
    public function get($projectId, $id, $options = []);
}
