<?php namespace PacketHost\Client\Api;

class User extends \PacketHost\Client\Api\BaseApi  implements \PacketHost\Client\Api\Interfaces\UserInterface {

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, 'users/:id', \PacketHost\Client\Domain\User::class , 'users' );
    }

    public function get( $id, $options = ""){

        return $this->getEntity( $this->getParams( $id ), $options );
    }

    private function getParams($id = ""){
        return [
            "id" => $id
        ];
    }

    public function getAll( $options = ""){

        return $this->getEntities( $this->getParams(), $options);
    }

    public function update( $id, $data, $options = "" ){

        return $this->updateEntity( $this->getParams( $id ), $data, $options );

    }


}