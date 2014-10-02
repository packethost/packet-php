<?php namespace PacketHost\Client\Api;

abstract class BaseApi implements \PacketHost\Client\Api\Interfaces\ApiInterface{

    private $adapter;

    private $slug;

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter, $slug ){
        
        $this->adapter = $adapter;
        $this->slug = $slug;
       
    }

    public function getAll(){

        $projects = $this->adapter->get( $this->slug );

        return $projects;
    }

    public function get( $id ){

        $projects = $this->adapter->get( $this->slug."/{$id}" );

        return $projects;
    }

    public function create( $data ){

        return $this->adapter->post( $this->slug, $data );

    }

    public function delete( $id ){

        return $this->adapter->delete( $this->slug."/{$id}" );

    }

    protected function getAdapter(){
        return $this->adapter;
    }

    protected function getSlug(){
        return $this->slug;
    }
}