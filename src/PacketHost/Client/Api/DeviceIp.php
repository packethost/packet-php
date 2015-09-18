<?php namespace PacketHost\Client\Api;

class DeviceIp extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\DeviceIpInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "devices/:deviceId/ips", \PacketHost\Client\Domain\IpAddress::class, 'ips');
    }
    
    public function getAll($deviceId, $options = [])
    {
        return $this->getEntities($this->getParams($deviceId), $options);
    }
    
    public function get($deviceId, $id, $options = [])
    {
        return $this->getEntity($this->getParams($deviceId, $id), $options);
    }

    public function create($deviceId, $data, $options = [])
    {
        return $this->createEntity($this->getParams($deviceId), $data, $options);
    }

    public function delete($deviceId, $id, $options = [])
    {

        return $this->deleteEntity($this->getParams($deviceId, $id), $options);
    }

    public function update($deviceId, $id, $data, $options = [])
    {

        return $this->updateEntity($this->getParams($deviceId, $id), $data, $options);
    }

    private function getParams($deviceId, $id = '')
    {
        return [
            "deviceId" => $deviceId,
            "id" => $id
        ];
    }
}
