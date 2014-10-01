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
        return $response->json();
    }

    public function post( $resource, $content, array $headers = array()){

        $jsonContent = json_encode($content);
        return $this->getClient()->post( $resource, $headers, $jsonContent );

    }

    public function delete ( $resource ,array $headers = array()){

    }

    public function put ( $resource, $content, array $headers = array() ){

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