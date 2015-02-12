<?php namespace PacketHost\Client\Api;

class Device extends BaseApi implements \PacketHost\Client\Api\Interfaces\DeviceInterface
{

    const PROJECTID = "projectId";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/devices/:id", \PacketHost\Client\Domain\Device::class, 'devices');
    }

    public function getAll($projectId, $options = [])
    {
        return $this->getEntities($this->getParams($projectId), $options);
    }

    public function get($projectId, $id, $options = [])
    {
        return $this->getEntity($this->getParams($projectId, $id), $options);
    }

    public function create($projectId, $data, $options = [])
    {
        return $this->createEntity($this->getParams($projectId), $data, $options);
    }

    private function getParams($projectId, $id = "")
    {
        return [
             self::PROJECTID => $projectId,
            "id" => $id
        ];
    }

    public function delete($projectId, $id, $options = [])
    {
        return $this->deleteEntity($this->getParams($projectId, $id), $options);
    }

    public function update($projectId, $id, $data, $options = [])
    {
        return $this->updateEntity($this->getParams($projectId, $id), $data, $options);
    }
}
