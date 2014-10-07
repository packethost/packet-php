<?php namespace PacketHost\Client\Api;

class OperatingSystem extends BaseApi implements \PacketHost\Client\Api\Interfaces\OperatingSystemInterface {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "oses", \PacketHost\Client\Domain\Location::class, 'oses');
    }

    public function getAll( $options = ""){

        return $this->getEntities( [], $options);
    }
}