<?php namespace PacketHost\Client\Domain;

class Device extends BaseDomain
{

    /**
     * @var string
     */
    public $hostname;

    public $state;

    public $project;

    public $plan;

    public $operatingSystem;

    public $billingCycle;

    public $tags;

    public $facility;

    public $server;

    public $ipAddresses;

    public $userdata;

    public $provisioningPercentage;

    public $provisioningEvents;

    public $rootPassword;

    public $locked;

    public $user;

    public $deletedAt;
}
