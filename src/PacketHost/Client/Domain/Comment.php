<?php namespace PacketHost\Client\Domain;

class Comment extends BaseDomain{

    /**
     * @var string
     */
    public $body;

    /**
     * @var bool
     */
    public $public;
    
}