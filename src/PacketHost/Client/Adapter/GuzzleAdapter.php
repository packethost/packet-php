<?php

namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface
{
    //TODO: Change endpoint to be dynamic
    const ENDPOINT = "http://localhost:3000/";

    private $client = null;

    public function __construct(\PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration)
    {
        parent::__construct($configuration);
    }

    private function handleResponse($response)
    {

        \PacketHost\Client\Exceptions\ResponseExceptions\ResponseExceptionFactory::create($response->getStatusCode(), $response->json(['object' => true]));
    }

    private function handleRequest($request)
    {
        
        \PacketHost\Client\Exceptions\RequestExceptions\RequestExceptionFactory::create($request);
    }

    public function get($resource)
    {

        try {
            $response = $this->getClient()->get($resource);

            return $this->convertToObjects($response->getBody());
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            $this->handleResponse($e->getResponse());
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            
            $this->handleRequest($e->getRequest());
            
        }
    }

    public function post($resource, $content, array $headers = array())
    {

        try {
            //Remove null properties from domain objetcs
            if ($content instanceof \PacketHost\Client\Domain\BaseDomain) {
                $content = array_filter((array) $content);
            }

            $response = $this->getClient()->post($resource, ['json' => $content]);

            return $this->convertToObjects($response->getBody());
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            $this->handleResponse($e->getResponse());
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            
            $this->handleRequest($e->getRequest());
            
        }
    }

    public function patch($resource, $content, array $headers = array())
    {

        try {
            //Remove null properties from domain objetcs
            if ($content instanceof \PacketHost\Client\Domain\BaseDomain) {
                $content = array_filter((array) $content);
            }

            $response = $this->getClient()->patch($resource, ['json' => $content]);

            return $this->convertToObjects($response->getBody());
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            $this->handleResponse($e->getResponse());
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            
            $this->handleRequest($e->getRequest());
            
        }
    }

    public function delete($resource, array $headers = array())
    {

        try {
            $response = $this->getClient()->delete($resource);

            return $response->getStatusCode() == 204;
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            $this->handleResponse($e->getResponse());
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            
            $this->handleRequest($e->getRequest());
            
        }
    }

    public function put($resource, $content, array $headers = array())
    {
        
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