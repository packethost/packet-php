<?php namespace PacketHost\Client\Api;

class ProjectInvitation extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectInvitationInterface
{

    const PROJECTID = "projectId";
    
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/invitations/:id", \PacketHost\Client\Domain\Invitation::class, 'invitations');
    }
    
    public function getAll($projectId, $options = "")
    {
        return $this->getEntities($this->getParams($projectId), $options);
    }
    
    public function get($projectId, $id, $options = "")
    {

        $entity = $this->getEntity($this->getParams($projectId, $id), $options);

        return $entity;
    }

    public function create($projectId, $data, $options = "")
    {

        return $this->createEntity($this->getParams($projectId), $data, $options);
    }

    public function delete($projectId, $id, $options = "")
    {

        return $this->deleteEntity($this->getParams($projectId, $id), $options);
    }

    public function update($projectId, $id, $data, $options = "")
    {

        return $this->updateEntity($this->getParams($projectId, $id), $data, $options);
    }
    
    private function getParams($projectId, $id = "")
    {
        return [
             self::PROJECTID => $projectId,
            "id" => $id
        ];
    }
}
