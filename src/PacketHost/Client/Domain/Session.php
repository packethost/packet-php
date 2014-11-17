<?php namespace PacketHost\Client\Domain;

class Session extends BaseDomain{

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $token;

    public $expiresAt;

    public $user;

}