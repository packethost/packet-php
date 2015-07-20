<?php namespace PacketHost\Client\Api;

class DeviceTraffic extends BaseApi implements \PacketHost\Client\Api\Interfaces\DeviceTrafficInterface
{

    const DEVICEID = "deviceId";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'devices/:deviceId/traffic/', \PacketHost\Client\Domain\Traffic::class, '');
    }

    public function create($deviceId, $data, $options = '')
    {
        return $this->createEntity($this->getParams($deviceId), $data, $options);
    }

    private function getParams($deviceId)
    {
        return [
            self::DEVICEID => $deviceId
        ];
    }
}
