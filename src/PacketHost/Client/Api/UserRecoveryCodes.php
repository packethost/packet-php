<?php

namespace PacketHost\Client\Api;

class UserRecoveryCodes extends BaseApi implements \PacketHost\Client\Api\Interfaces\UserRecoveryCodesInterface
{
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'user/recovery-codes', \PacketHost\Client\Domain\UserRecoveryCodes::class, 'recovery_codes');
    }
    
    public function getAll($options = [])
    {
        return $this->getEntities($this->getParams(), $options);
    }

    public function create($options = [])
    {
        return $this->createEntity($this->getParams(), $options);
    }

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }
}
