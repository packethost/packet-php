<?php

namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface
{

    const GET   = "get";
    const POST  = "post";
    const PUT   = "put";
    const PATCH = "patch";
    const DELETE= "delete";

    private $validHttpMethods = [];
    private $client = null;

    public function __construct(\PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration)
    {
        parent::__construct($configuration);

        $this->validHttpMethods = [self::GET, self::POST, self::PUT, self::PATCH, self::DELETE];
    }

    private function isValidMethod( $method ){
        return in_array($method,$this->validHttpMethods);
    }

    private function handleResponse($response)
    {

        \PacketHost\Client\Exceptions\ResponseExceptions\ResponseExceptionFactory::create($response->getStatusCode(), $response->json(['object' => true]));
    }

    private function handleRequest($request)
    {
        
        \PacketHost\Client\Exceptions\RequestExceptions\RequestExceptionFactory::create($request);
    }

    private function execute( $type, $resource, $content, $headers ){

        $settings = count($headers)>0?['headers'=>$headers]:[];

        $data  = [];

        //$settings['debug'] = false;

        //Remove null properties from domain objetcs
        if ($content instanceof \PacketHost\Client\Domain\BaseDomain) {
            $data = $content->toArray();
        }
        else{
            $data = $content;
        }

        $settings['json'] = $data;
        
        try {

            if ( $this->isValidMethod($type )){
                $response = $this->getClient()->{$type}($resource, $settings);
                return $this->convertToObjects($response->getBody());
            }

            throw new \Exception("Method not found: {$type}");
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            $this->handleResponse($e->getResponse());
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            
            $this->handleRequest($e->getRequest());
            
        }

    }
    public function get($resource, array $headers = array())
    {
        return $this->execute( self::GET, $resource, null, $headers );
    }

    public function post($resource, $content, array $headers = array())
    {
        return $this->execute( self::POST, $resource, $content, $headers );
    }

    public function patch($resource, $content, array $headers = array())
    {
        return $this->execute( self::PATCH, $resource, $content, $headers );
    }

    public function delete($resource, array $headers = array())
    {
        return $this->execute( self::DELETE, $resource, null, $headers );
    }

    public function put($resource, $content, array $headers = array())
    {
        return $this->execute( self::PUT, $resource, $content, $headers );
    }

    private function convertToObjects($data)
    {
        $data = json_decode($data);

        return $data;
    }

    private function getClient()
    {

        if ( ! $this->client) {

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];

            if ($this->configuration->getAuthToken()) {
                $headers['X-Auth-Token'] = $this->configuration->getAuthToken();
            }

            if ($this->configuration->getConsumerToken()) {
                $headers['X-Consumer-Token'] = $this->configuration->getConsumerToken();
            }

            //Add default header values
            if ( is_array($this->configuration->getHeaders()) && count($this->configuration->getHeaders())>0){
                $headers[] = $this->configuration->getHeaders();
            }
            
            // Create a client with a base URL
            $this->client = new \GuzzleHttp\Client(
                    [
                'base_url' => $this->configuration->getEndPoint(),
                'defaults' => [
                    'headers' => $headers
                ]
                    ]);
        }

        return $this->client;
    }
}