<?php namespace PacketHost\Client\Api;

abstract class BaseApi {

    private $adapter;

    public $slug;
    
    private $domain;

    private $collectionSlug;

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter, $slug, $domain, $collectionSlug){
        
        $this->adapter = $adapter;
        $this->slug = $slug;
        $this->domain = $domain;
        $this->collectionSlug = $collectionSlug;
       
    }

    protected function getEntities( $params, $options = []){

        $apiCollection = $this->adapter->get( $this->getUrl( $params, $options ), $this->getHeader( $options ) );

        $class=$this->domain;
        return array_map(
            function ($apiObject) use( $class ) {
                return new $class($apiObject);
            },
            $apiCollection->{$this->collectionSlug}
        );
    }

    private function getHeader( $options ){
        return isset( $options['headers']) ? $options['headers']: [];
    }

    public function getEntity( $id, $options = [] ){

        $apiObject = $this->adapter->get( $this->getUrl( $id, $options ), $this->getHeader( $options ) );

        return new $this->domain($apiObject);
    }

    private function getUrl( $params = [], $options = []){

        $compiledSlug = $this->slug;
        $queryParams =  isset ( $options['queryParams'] )?"?".$options['queryParams']:'';

        foreach( $params as $key => $value ){
            $compiledSlug = str_replace( ":{$key}",$value, $compiledSlug);

        }
  

        return $compiledSlug.$queryParams;
    }

    private function validateOptions( $options ){

        //TODO: We need to validate the options we are sending to the api
        return $options;
    }

    public function createEntity( $params, $data, $options = []){

        $createdObject = $this->adapter->post( $this->getUrl( $params, $options ), $data, $this->getHeader( $options ));

        return new $this->domain($createdObject);
    }

    public function deleteEntity( $params, $options ){

        return $this->adapter->delete( $this->getUrl( $params, $options ), $this->getHeader( $options ) );

    }

    public function updateEntity( $params, $data, $options = [] ){

        $updatedObject = $this->adapter->patch( $this->getUrl( $params, $options ), $data, $this->getHeader( $options )  );

        return new $this->domain($updatedObject);
    }

    protected function getAdapter(){
        return $this->adapter;
    }

    protected function getSlug(){
        return $this->slug;
    }
}