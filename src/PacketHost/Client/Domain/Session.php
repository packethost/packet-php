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

    public function __construct(){
        parent::__construct();
    }


}