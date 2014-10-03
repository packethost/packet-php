<?php namespace PacketHost\Client\Api;

abstract class BaseApi implements \PacketHost\Client\Api\Interfaces\ApiInterface{

    private $adapter;

    private $slug;
    
    private $domain;

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter, $slug , $domain){
        
        $this->adapter = $adapter;
        $this->slug = $slug;
        $this->domain = $domain;
       
    }

    public function getAll( $include = ''){

        $apiCollection = $this->adapter->get( $this->getUrl( '', $include ) );
        //dd($apiCollection);
        $class=$this->domain;
        return array_map(
            function ($apiObject) use( $class ) {
                return new $class($apiObject);
            },
            $apiCollection->{$this->slug}
        );
    }

    public function get( $id, $include = ''){

        $apiObject = $this->adapter->get( $this->getUrl( $id, $include ) );

        return new $this->domain($apiObject);
    }

    private function getUrl( $param = "", $include = "" ){

        $param = $param?"/{$param}":'';
        $include = $include?"?include={$include}":'';
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