<?php namespace PacketHost\Client\Api;

class DeviceEvent extends BaseApi implements \PacketHost\Client\Api\Interfaces\DeviceEventInterface
{

    const DEVICEID = "deviceId";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'devices/:deviceId/events/', \PacketHost\Client\Domain\Event::class, 'events');
    }

    public function getAll($deviceId, $options = "")
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
