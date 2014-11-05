<?php namespace PacketHost\Client\Domain;

class PaymentMethod extends BaseDomain{

    /**
     * @var string
     */
    public $nonce;

    public $cardType;

    public $expirationMonth;

    public $expirationYear;

    public $last_4;

    public $user;

    public $projects;
    
}