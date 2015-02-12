<?php namespace PacketHost\Client\Domain;

class PaymentMethod extends BaseDomain
{

    /**
     * @var string
     */
    public $nonce;

    public $cardType;

    public $expirationMonth;

    public $expirationYear;

    public $last4;

    public $user;

    public $projects;

    public $name;

    public $type;

    public $email;

    public $default;

    public $cardholderName;

    public $billingAddress;
}
