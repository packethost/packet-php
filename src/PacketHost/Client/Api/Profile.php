<?php namespace PacketHost\Client\Api;

class Profile extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\ProfileInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'user', \PacketHost\Client\Domain\User::class, '');
    }

    public function get($options = [])
    {
        return $this->getEntity([], $options);
    }

    public function update($data, $options = [])
    {
        return $this->updateEntity([], $data, $options);
    }
}
