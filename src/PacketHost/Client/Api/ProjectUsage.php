<?php namespace PacketHost\Client\Api;

class ProjectUsage extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectUsageInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'projects/:projectId/usages/', \PacketHost\Client\Domain\Usage::class, 'usages');
    }

    public function getAll($projectId, $options = [])
    {
        return $this->getEntities($this->getParams($projectId), $options);
    }

    private function getParams($projectId)
    {
        return [
            "projectId" => $projectId
        ];
    }
}
