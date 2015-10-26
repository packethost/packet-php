<?php namespace PacketHost\Client\Domain;

class IpAddress extends BaseDomain
{
    public $id;
    public $network;
    public $address;
    public $gateway;
    public $addressFamily;
    public $netmask;
    public $public;
    public $cidr;
    public $assignments;
    public $assignedTo;
    public $management;
    public $manageable;
    public $addon;
    public $bill;

    public function __toString()
    {
        return "{$this->network}/{$this->cidr}";
    }
}
