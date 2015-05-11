<?php namespace PacketHost\Client\Api;

class TransferRequest extends BaseApi implements \PacketHost\Client\Api\Interfaces\TransferRequestInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "projects/:projectId/transfers/:id", \PacketHost\Client\Domain\TransferRequest::class, 'transfers');
    }
     
    public function get($projectId, $id, $options = [])
    {
        return $this->getEntity($this->getParams($projectId, $id), $options);
    }

    public function create($projectId, $data, $options = [])
    {
        return $this->createEntity($this->getParams($projectId), $data, $options);
    }

    public function delete($projectId, $id, $options = [])
    {
        return $this->deleteEntity($this->getParams($projectId, $id), $options);
    }

    public function update($projectId, $id, $data, $options = [])
    {
        return $this->updateEntity($this->getParams($projectId, $id), $data, $options);
    }

    private function getParams($projectId, $id = "")
    {
        return [
            "projectId" => $projectId,
            "id" => $id
        ];
    }
}
