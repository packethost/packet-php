<?php namespace PacketHost\Client\Domain;

class PaymentMethod extends BaseDomain{

    /**
     * @var string
     */
    public $nonce;

    public $cardType;
    
}