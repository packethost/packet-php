<?php namespace PacketHost\Client\Api;

class Plan extends BaseApi implements \PacketHost\Client\Api\Interfaces\PlanInterface {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "plans/:id", \PacketHost\Client\Domain\Plan::class, 'plans');
    }
    
    public function getAll( $options = [])
    {
        return $this->getEntities( $this->getParams(), $options );
    }
    
    public function get(  $id, $options = []){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    private function getParams ( $id = ""){
        return [
            "id" => $id
        ];
    }
}