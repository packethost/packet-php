<?php namespace PacketHost\Client\Api;

class ProjectCredit extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectCreditInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/credits", \PacketHost\Client\Domain\Credit::class, 'credits');
    }

    public function create($projectId, $data, $options = [])
    {
        return $this->createEntity($this->getParams($projectId), $data, $options);
    }
    
    private function getParams($projectId)
    {
        return [
            "projectId" => $projectId
        ];
    }
}
