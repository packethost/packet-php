<?php namespace PacketHost\Client\Adapter;

class GuzzleAdapter implements AdapterInterface{

    const ENDPOINT = "http://localhost:3000/";

    private $client = null;

    public function __construct(){

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
                        'X-Auth-Token' => '3567c799bffa8fd622596d4184f7977f' //TODO: We need to remove it from here
                    ]
                ] 
            ] );

        }

        return $this->client;
    }

}