<?php namespace PacketHost\Client\Api;

class Notification extends BaseApi {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'notifications', \PacketHost\Client\Domain\Notification::class);
    }

}


