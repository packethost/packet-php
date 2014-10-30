<?php namespace PacketHost\Client\Api;

class Session extends BaseApi implements \PacketHost\Client\Api\Interfaces\SessionInterface  {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){

        parent::__construct( $adapter, 'sessions/:id', \PacketHost\Client\Domain\Session::class, '' );
        
    }
    

    public function get( $id, $options = ""){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    private function getParams($id = ""){
        return [
            "id" => $id
        ];
    }

    public function create( $data, $options = "" ){

        return $this->createEntity( $this->getParams(  ), $data, $options );

    }

} 