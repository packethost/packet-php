<?php namespace PacketHost\Client\Api;

class StorageDetach extends BaseApi implements \PacketHost\Client\Api\Interfaces\StorageDetachInterface
{

    const ID = "id";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "storage/attachments/:id", \PacketHost\Client\Domain\Volume::class, 'volumes');
    }

    public function delete($id, $options = [])
    {
        return $this->deleteEntity($this->getParams($id), $options);
    }

    private function getParams($id)
    {
        return [
             self::ID => $id
        ];
    }
}
