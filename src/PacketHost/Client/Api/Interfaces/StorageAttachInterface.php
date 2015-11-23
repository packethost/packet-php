<?php namespace PacketHost\Client\Api\Interfaces;

interface StorageAttachInterface
{
    public function create($id, $data, $options = []);
}
