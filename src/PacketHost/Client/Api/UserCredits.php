<?php namespace PacketHost\Client\Api;

class UserCredits extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\UserCreditsInterface
{
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "user/credits", \PacketHost\Client\Domain\Credit::class, 'credits');
    }
    
    public function getAll($options = [])
    {
        return $this->getEntities($options);
    }
}
