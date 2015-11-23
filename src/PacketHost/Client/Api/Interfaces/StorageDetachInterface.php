<?php namespace PacketHost\Client\Api\Interfaces;

interface StorageDetachInterface
{
    public function delete($id, $options = []);
}
