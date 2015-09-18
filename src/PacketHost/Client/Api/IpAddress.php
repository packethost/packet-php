<?php namespace PacketHost\Client\Api;

class IpAddress extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\IpAddressInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "ips/:id", \PacketHost\Client\Domain\IpAddress::class, 'ips');
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

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }
}
