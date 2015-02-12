<?php namespace PacketHost\Client\Api;

class OperatingSystem extends BaseApi implements \PacketHost\Client\Api\Interfaces\OperatingSystemInterface
{

    
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "operating-systems/:id", \PacketHost\Client\Domain\OperatingSystem::class, 'operating_systems');
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
