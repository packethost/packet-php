<?php namespace PacketHost\Client\Api;

class StorageEvent extends BaseApi implements \PacketHost\Client\Api\Interfaces\StorageEventInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'storage/:volumeId/events/', \PacketHost\Client\Domain\Event::class, 'events');
    }

    public function getAll($volumeId, $options = [])
    {
        return $this->getEntities($this->getParams($volumeId), $options);
    }

    private function getParams($volumeId)
    {
        return [
            "volumeId" => $volumeId
        ];
    }
}
