<?php namespace PacketHost\Client\Api\Interfaces;

interface StorageSnapshotPolicyInterface
{
    public function create($volumeid, $data, $options = []);

    public function update($volumeid, $id, $data, $options = []);

    public function delete($volumeid, $id, $options = []);
}
