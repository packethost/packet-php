<?php namespace PacketHost\Client\Domain;

class Event extends BaseDomain
{

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $interpolated;

    /**
     * @var string
     */
    public $relationships;

    public $whodunnit;

    public $context;
}
