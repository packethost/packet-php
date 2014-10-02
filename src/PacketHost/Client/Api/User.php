<?php namespace PacketHost\Client\Api;

class User extends \PacketHost\Client\Api\BaseApi  {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'users' );
    }

}