<?php namespace PacketHost\Client\Domain;

class Ticket extends BaseDomain{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $priority;

    
    public $organization;
    public $comments;
    public $created_by;


}