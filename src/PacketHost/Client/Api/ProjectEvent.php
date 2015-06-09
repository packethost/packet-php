<?php namespace PacketHost\Client\Api;

class ProjectEvent extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectEventInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'projects/:projectId/events/', \PacketHost\Client\Domain\Event::class, 'events');
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
