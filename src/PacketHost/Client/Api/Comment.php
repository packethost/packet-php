<?php namespace PacketHost\Client\Api;

class Comment extends BaseApi implements \PacketHost\Client\Api\Interfaces\CommentInterface{

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'comments/:id', \PacketHost\Client\Domain\Comment::class, 'comments' );
    }
    
    public function get( $id, $options = ""){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    public function update( $id, $data, $options = "" ){

        return $this->updateEntity( $this->getParams( $id ), $data, $options );
    }
    
    public function delete( $id, $options = "" ){
        
        return $this->deleteEntity($this->getParams( $id ), $options);
    }
    
    private function getParams($id = ""){
        return [
            "id" => $id
        ];
    }
}