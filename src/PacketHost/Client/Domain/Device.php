<?php namespace PacketHost\Client\Domain;

class Device extends BaseDomain
{

    /**
     * @var string
     */
    public $name;

    public $state;

    public $project;

    public $charges;

    public $plan;

    public $operatingSystem;

    public $billingCycle;

    public $tags;

    public $facility;

    public $server;

    public $ipAddresses;

    public $userdata;
}
