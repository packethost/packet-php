<?php namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface{

    //TODO: Change endpoint to be dynamic
    const ENDPOINT = "http://localhost:3000/";

    private $client = null;

     public function __construct( $authToken, $consumerToken ){
       parent::__construct( $authToken, $consumerToken );
    }

    public function get( $resource ){
        
        $response = $this->getClient()->get( $resource );
        return $this->convertToObjects($response->getBody());
    }

    public function post( $resource, $content, array $headers = array()){

        return $this->convertToObjects( $this->getClient()->post( $resource, ['json' => $content] )->getBody() );

    }

    public function delete ( $resource ,array $headers = array()){

        $response = $this->getClient()->post( $resource )->getBody() ;

        return $response->getStatusCode() == 204;
    }

    public function put ( $resource, $content, array $headers = array() ){

    }

    private function convertToObjects( $data ){
        
        $data = json_decode( $data );

        return $data;
    }

    private function getClient(){

        if ( ! $this->client ){ 

            // Create a client with a base URL
            $this->client = new \GuzzleHttp\Client( 
                [
                    'base_url' => self::ENDPOINT,
                    'defaults' => [
                        'headers' => [
                            'Content-Type'=> 'application/json',
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