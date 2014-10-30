<?php namespace PacketHost\Client\Api;

class Location extends BaseApi implements \PacketHost\Client\Api\Interfaces\LocationInterface {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "locations", \PacketHost\Client\Domain\Location::class, 'locations');
    }

    public function getAll( $options = ""){

        return $this->getEntities( [], $options);
    }
}