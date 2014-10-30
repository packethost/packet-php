<?php namespace PacketHost\Client\Domain;

class Ticket extends BaseDomain{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $conversationMessage;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var boolean
     */
    public $open;

}