<?php namespace PacketHost\Client\Api;

class StorageSnapshotPolicy extends BaseApi implements \PacketHost\Client\Api\Interfaces\StorageSnapshotPolicyInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'storage/:volumeid/snapshot-policies/:id', \PacketHost\Client\Domain\SnapshotPolicy::class, 'snapshots-policies', self::SHALLOW, '/storage/');
    }

    public function create($volumeid, $data, $options = "")
    {

        return $this->createEntity($this->getParams($volumeid), $data, $options);
    }

    public function update($volumeid, $id, $data, $options = "")
    {

        return $this->updateEntity($this->getParams($volumeid, $id), $data, $options);
    }

    public function delete($volumeid, $id, $options = [])
    {
        return $this->deleteEntity($this->getParams($volumeid, $id), $options);
    }

    private function getParams($volumeid = "", $id = "")
    {
        return [
            "volumeid" => $volumeid,
            'id' => $id
        ];
    }
}
