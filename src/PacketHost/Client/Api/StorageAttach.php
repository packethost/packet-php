<?php namespace PacketHost\Client\Api;

class StorageAttach extends BaseApi implements \PacketHost\Client\Api\Interfaces\StorageAttachInterface
{

    const ID = "id";

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "storage/:id/attachments", \PacketHost\Client\Domain\Attachment::class, 'attachments');
    }

    public function create($id, $data, $options = [])
    {
        return $this->createEntity($this->getParams($id), $data, $options);
    }

    private function getParams($id)
    {
        return [
             self::ID => $id
        ];
    }
}
