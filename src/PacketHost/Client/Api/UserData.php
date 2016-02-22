<?php namespace PacketHost\Client\Api;

class UserData extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\UserDataInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter, $type = \PacketHost\Client\Domain\UserData::class)
    {
        parent::__construct($adapter, 'userdata/validate', $type, 'userdata');
    }

    public function create($data, $options = "")
    {
        $options = [ 'headers' => [ 'Content-Type' => 'text/plain' ] ];
        return $this->createEntity([], $data, $options);
    }
}
