<?php namespace PacketHost\Client\Domain;

class Ticket extends BaseDomain
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $body;

    /**
     * @var boolean
     */
    public $open;

    public $tickets = [];

    public $user;

    public $assignee;
}
