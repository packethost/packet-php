<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectCreditInterface
{
    public function create($projectId, $data, $options = []);
}
