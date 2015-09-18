<?php namespace PacketHost\Client\Api;

class ProjectIp extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectIpInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/ips/:id", \PacketHost\Client\Domain\IpAddress::class, 'ip_addresses', self::SHALLOW);
    }
    
    public function getAll($projectId, $options = [])
    {
        return $this->getEntities($this->getParams($projectId), $options);
    }
    
    public function get($projectId, $id, $options = [])
    {

        return $this->getEntity($this->getParams($projectId, $id), $options);
    }

    public function delete($projectId, $id, $options = [])
    {

        return $this->deleteEntity($this->getParams($projectId, $id), $options);
    }

    private function getParams($projectId, $id = "")
    {
        return [
            "projectId" => $projectId,
            "id" => $id
        ];
    }
}
