<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectStorageInterface
{
    public function getAll($projectId, $options = []);

    public function create($projectId, $data, $options = []);
}
