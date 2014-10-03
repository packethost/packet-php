<?php namespace PacketHost\Client\Api;

class Invitation extends BaseApi {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'invitation' );
    }
}