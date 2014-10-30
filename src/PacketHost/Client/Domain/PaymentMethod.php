<?php namespace PacketHost\Client\Domain;

class PaymentMethod extends BaseDomain{

    /**
     * @var string
     */
    public $nonce;

    /**
     * @var
     */
    public $user;
    
    /**
     * @var array
     */
    public $projects;
    
}