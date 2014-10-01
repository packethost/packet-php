<?php namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface{

    const ENDPOINT = "http://localhost:3000/";

    private $client = null;

     public function __construct( $authToken, $consumerToken ){
       parent::__construct( $authToken, $consumerToken );
    }

    public function get( $resource ){

        return $this->getClient()->get( $resource );
    }

    public function post( $resource, array $headers = array(), $content = ''){

    }

    public function delete ( $resource ,array $headers = array()){

    }

    public function put ( $resource ,array $headers = array(), $content = ''){

    }

    private function getClient(){

        if ( ! $this->client ){ 

            // Create a client with a base URL
            $this->client = new \Guzzle\Http\Client(  self::ENDPOINT,
                [
                    'defaults' => [
                    'headers' => [
                        'Accept' => 'application/json',
                        'X-Auth-Token' => $this->authToken, //TODO: We need to remove it from here
                        'X-Consumer-Token' => $this->consumerToken
                    ]
                ] 
            ] );

        }

        return $this->client;
    }

}