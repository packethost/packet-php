<?php namespace PacketHost\Client\Api;

class Coupon extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\CouponInterface
{
    
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "coupons/redeem", \PacketHost\Client\Domain\Coupon::class, 'coupons/redeem');
    }

    public function getAll($options = [])
    {

        return $this->getEntities($this->getParams(), $options);
    }
    
    public function create($data, $options = [])
    {
        return $this->createEntity([], $data, $options);
    }
}
