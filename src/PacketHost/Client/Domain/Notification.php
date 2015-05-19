<?php namespace PacketHost\Client\Domain;

class Notification extends BaseDomain
{

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $read;

    /**
     * @var string
     */
    public $user;

    /**
     * Posible values info, warning, error
     * @var string
     */
    public $severity;

    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $context;
}
