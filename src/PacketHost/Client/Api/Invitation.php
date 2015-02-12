<?php namespace PacketHost\Client\Api;

class Invitation extends BaseApi implements \PacketHost\Client\Api\Interfaces\InvitationInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "invitations/:id", \PacketHost\Client\Domain\Invitation::class, 'invitations');
    }
    
    public function getAll($options = [])
    {
        return $this->getEntities($this->getParams(), $options);
    }
    
    public function get($id, $options = [])
    {

        return $this->getEntity($this->getParams($id), $options);
    }

    public function create($data, $options = [])
    {

        return $this->createEntity($this->getParams(), $data, $options);
    }

    public function delete($id, $options = [])
    {

        return $this->deleteEntity($this->getParams($id), $options);
    }

    public function update($id, $data, $options = [])
    {

        return $this->updateEntity($this->getParams($id), $data, $options);
    }

    public function resend($id, $options = [])
    {
        
        return $this->createEntity($this->getParams($id), [], $options);
    }

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }
}
