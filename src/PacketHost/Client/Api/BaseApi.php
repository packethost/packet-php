<?php namespace PacketHost\Client\Api;

abstract class BaseApi implements \PacketHost\Client\Api\Interfaces\ApiInterface{

    private $adapter;

    private $slug;

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter, $slug ){
        
        $this->adapter = $adapter;
        $this->slug = $slug;
       
    }

    public function getAll( $include = ''){

        $projects = $this->adapter->get( $this->getUrl( '', $include ) );

        return $projects;
    }

    public function get( $id, $include = ''){

        $projects = $this->adapter->get( $this->getUrl( $id, $include ) );

        return $projects;
    }

    private function getUrl( $param = "", $include = "" ){

        $param = $param?"/{$param}":'';
        $include = $include?"/{$include}":'';
        return $this->slug.$param.$include;
    }

    private function getIncludeParam( $include ){

        if ( $include )
            return "?include={$include}";

        return '';
    }

    public function create( $data, $include = "" ){

        return $this->adapter->post( $this->getUrl( '', $include ), $data );

    }

    public function delete( $id ){

        return $this->adapter->delete( $this->getUrl( $id ) );

    }

    protected function getAdapter(){
        return $this->adapter;
    }

    protected function getSlug(){
        return $this->slug;
    }
}