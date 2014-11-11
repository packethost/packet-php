<?php namespace PacketHost\Client\Api;

class PaymentMethod extends BaseApi implements \PacketHost\Client\Api\Interfaces\PaymentMethodInterface{

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'payment-methods/:id', \PacketHost\Client\Domain\PaymentMethod::class, 'payment_methods' );
    }
    
    public function getAll( $options = []){
        return $this->getEntities( $this->getParams(), $options);
    }


    public function get( $id, $options = []){
        return $this->getEntity( $this->getParams( $id ), $options );
    }

    public function create( $paymentMethod, $options = []){
        return $this->createEntity( $this->getParams(), $paymentMethod, $options );
    }
    
    public function delete( $id , $options = []){
        return $this->deleteEntity($this->getParams( $id ), $options );
    }
    
    private function getParams($id = ""){
        return [
            "id" => $id
        ];
    }
}