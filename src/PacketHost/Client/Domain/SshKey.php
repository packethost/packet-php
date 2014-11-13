<?php namespace PacketHost\Client\Domain;

class SshKey extends BaseDomain{

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $key;
    
    public $fingerprint;

    public $user;
}