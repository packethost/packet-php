<?php namespace PacketHost\Client\Api;

class Session extends BaseApi implements \PacketHost\Client\Api\Interfaces\SessionInterface{

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter );
    }


    public function login ( \PacketHost\Client\Domain\Session $session ){

        return $this->adapter->post('sessions', $session );
    }
} 