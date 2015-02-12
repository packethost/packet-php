<?php namespace PacketHost\Client\Domain;

class Project extends BaseDomain
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $defaultFor;

    public $members;
    public $memberships;
    public $invitations;

    public $credits;

    public $creditTotal;

    public $devices;

    public $paymentMethod;

    public $paymentMethodId;

    public $isDefault;

    public $invoices;
}
