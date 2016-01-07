<?php namespace PacketHost\Client\Api;

class ProjectStorage extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectStorageInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/storage/", \PacketHost\Client\Domain\Volume::class, 'volumes', self::SHALLOW);
    }
    
    public function getAll($projectId, $options = [])
    {
        return $this->getEntities($this->getParams($projectId), $options);
    }

    public function create($projectId, $data, $options = [])
    {
        return $this->createEntity($this->getParams($projectId), $data, $options);
    }

    private function getParams($projectId)
    {
        return [
            "projectId" => $projectId,
        ];
    }
}
