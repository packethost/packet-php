<?php namespace PacketHost\Client\Api\Interfaces;

interface StorageSnapshotInterface
{
    public function getAll($volumeid, $options = []);

    public function create($volumeid, $data, $options = []);

    public function delete($volumeid, $id, $Options = []);
}
