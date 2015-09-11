<?php namespace PacketHost\Client\Api;

class DeviceUsage extends BaseApi implements \PacketHost\Client\Api\Interfaces\DeviceUsageInterface
{

    const DEVICEID = "deviceId";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'devices/:deviceId/usages/', \PacketHost\Client\Domain\Usage::class, 'usages');
    }

    public function getAll($deviceId, $options = '')
    {

        return $this->getEntities($this->getParams($deviceId), $options);
    }

    private function getParams($deviceId)
    {
        return [
            self::DEVICEID => $deviceId
        ];
    }
}
