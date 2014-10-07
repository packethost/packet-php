<?php namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface{

    //TODO: Change endpoint to be dynamic
    const ENDPOINT = "http://localhost:3000/";

    private $client = null;

    public function __construct( \PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration ){
       parent::__construct( $configuration );
    }

    public function get( $resource ){

        
        try {
           $response = $this->getClient()->get( $resource );
        }  catch (\GuzzleHttp\Exception\ClientException $e) {
             //TODO: This need to be changed
            echo print_r($e->getResponse()->json(),true);
            die();
        }

        return $this->convertToObjects($response->getBody());
    }

    public function post( $resource, $content, array $headers = array()){
        
        try {
            //Remove null properties from domain objetcs
            if($content instanceof \PacketHost\Client\Domain\BaseDomain){
                $content = array_filter((array) $content);
            }
            
            $response = $this->getClient()->post( $resource, ['json' => $content] );
            
            return $this->convertToObjects( $response->getBody() );   


        }  catch ( \GuzzleHttp\Exception\ClientException $e) {
            //dd($e->getRequest());
            //TODO: This need to be changed
            echo print_r($e->getResponse()->json(),true);
            die();
        }

    }

     public function patch( $resource, $content, array $headers = array()){
        
        try {
            //Remove null properties from domain objetcs
            if($content instanceof \PacketHost\Client\Domain\BaseDomain){
                $content = array_filter((array) $content);
            }
            
            $response = $this->getClient()->patch( $resource, ['json' => $content] );
            
            return $this->convertToObjects( $response->getBody() );   


        }  catch ( \GuzzleHttp\Exception\ClientException $e) {
            //dd($e->getRequest());
            //TODO: This need to be changed
            echo print_r($e->getResponse()->json(),true);
            die();
        }

    }


    public function delete ( $resource ,array $headers = array()){

        $response = $this->getClient()->delete( $resource );

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

            $headers = [
            'Content-Type'=> 'application/json',
            'Accept' => 'application/json',
            ];

            if ( $this->configuration->getAuthToken() ){
                $headers['X-Auth-Token'] = $this->configuration->getAuthToken();
            }

            if ( $this->configuration->getConsumerToken() ){
                $headers['X-Consumer-Token'] = $this->configuration->getConsumerToken();
            }


                    // Create a client with a base URL
            $this->client = new \GuzzleHttp\Client( 
                [
                'base_url' => $this->configuration->getEndPoint(),
                'defaults' => [
                'headers' => $headers
                ] 
                ] );

        }

        return $this->client;
    }

}

