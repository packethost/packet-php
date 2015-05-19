<?php namespace PacketHost\Client\Api;

class Facility extends BaseApi implements \PacketHost\Client\Api\Interfaces\FacilityInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "facilities/:id", \PacketHost\Client\Domain\Facility::class, 'facilities');
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
