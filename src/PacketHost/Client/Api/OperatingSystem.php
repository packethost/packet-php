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
    
    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }
}
