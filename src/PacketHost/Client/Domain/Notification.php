<?php namespace PacketHost\Client\Domain;

class Notification extends BaseDomain{

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

}