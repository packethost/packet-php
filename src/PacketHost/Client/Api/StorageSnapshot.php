<?php namespace PacketHost\Client\Api;

class StorageSnapshot extends BaseApi implements \PacketHost\Client\Api\Interfaces\StorageSnapshotInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'storage/:volumeid/snapshots/:id', \PacketHost\Client\Domain\Snapshot::class, 'snapshots');
    }
    
    public function getAll($volumeid, $options = "")
    {

        return $this->getEntities($this->getParams($volumeid), $options);
    }

    public function create($volumeid, $data, $options = "")
    {

        return $this->createEntity($this->getParams($volumeid), $data, $options);
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
