<?php namespace PacketHost\Client\Api;

class Profile extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\ProfileInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'user', \PacketHost\Client\Domain\User::class, '');
    }

    public function get($options = "")
    {

        return $this->getEntity($this->getParams(), $options);
    }

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }

    public function update($data, $options = "")
    {

        $user = new \PacketHost\Client\Domain\User($data);
        return $this->updateEntity($this->getParams(), $user, $options);
    }
}
