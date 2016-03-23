<?php namespace PacketHost\Client\Api;

class ProjectUsage extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectUsageInterface
{

    const PROJECTID = "projectId";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'projects/:projectId/usages/', \PacketHost\Client\Domain\ProjectUsage::class, 'usages');
    }

    public function getAll($projectId, $options = '')
    {

        return $this->getEntities($this->getParams($projectId), $options);
    }

    private function getParams($projectId)
    {
        return [
            self::PROJECTID => $projectId
        ];
    }
}
