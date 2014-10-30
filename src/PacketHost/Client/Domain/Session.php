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

    /*public function __construct( $login, $password ){
        parent::__construct();

        $this->login = $login;
        $this->password = $password;
    }*/


}