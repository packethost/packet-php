<?php namespace PacketHost\Client\Api;

class TicketComment extends BaseApi implements \PacketHost\Client\Api\Interfaces\TicketCommentInterface {

    const TicketID = "ticketId";
    
    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'tickets/:ticketId/comments/:id', \PacketHost\Client\Domain\Comment::class,'comments');
    }

    public function getAll( $ticketId, $options = ""){

        return $this->getEntities( $this->getParams($ticketId), $options);
    }

    public function create( $ticketId, $data, $options = ""){

        return $this->createEntity( $this->getParams( $ticketId ), $data, $options);
    }

    private function getParams( $ticketId, $id = ""){
        return [
            self::TicketID => $ticketId,
            "id" => $id
        ];
    }

}


