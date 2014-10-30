<?php namespace PacketHost\Client\Api;

class Membership extends BaseApi implements \PacketHost\Client\Api\Interfaces\MembershipInterface {

    
    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "memberships/:id", \PacketHost\Client\Domain\Membership::class, 'memberships');
    }
    
    public function get(  $id, $options = ""){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    public function delete( $id, $options = "" ){

        return $this->deleteEntity( $this->getParams( $id ), $options );
    }

    public function update( $id, $data, $options = "" ){

        return $this->updateEntity( $this->getParams( $id ), $data, $options );
    }
    
    private function getParams ( $id = ""){
        return [
            "id" => $id
        ];
    }
}