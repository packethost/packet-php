<?php namespace PacketHost\Client\Api;

class Ticket extends BaseApi implements \PacketHost\Client\Api\Interfaces\TicketInterface{

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'tickets/:id', \PacketHost\Client\Domain\Ticket::class, 'tickets' );
    }
    
    public function getAll( $options = ""){

        return $this->getEntities( $this->getParams(), $options);
    }

    public function get( $id, $options = ""){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    private function getParams($id = ""){
        return [
            "id" => $id
        ];
    }
}