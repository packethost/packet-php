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

    public function getAll( $options = ""){

        $apiCollection = $this->adapter->get( $this->getUrl( '', $options ) );
         
        $class=$this->domain;
        return array_map(
            function ($apiObject) use( $class ) {
                return new $class($apiObject);
            },
            $apiCollection->{$this->slug}
        );
    }

    public function get( $id, $options = ""){

        $apiObject = $this->adapter->get( $this->getUrl( $id, $options ) );

        return new $this->domain($apiObject);
    }

    private function getUrl( $param = "", $options = ""){

        $param = $param?"/{$param}":'';
        $options = $options?"?{$options}":'';
        return $this->slug.$param.$options;
    }

    private function validateOptions( $options = ""){

        //TODO: We need to validate the options we are sending to the api
        return $options;
    }

    public function create( $data, $options = ""){

        return $this->adapter->post( $this->getUrl( '', $options ), $data );

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