<?php

namespace PacketHost\Client\Adapter;

class GuzzleAdapter extends BaseAdapter implements AdapterInterface
{
    const MAX_ATTEMPTS = 5;
    const GET   = "get";
    const POST  = "post";
    const PUT   = "put";
    const PATCH = "patch";
    const DELETE= "delete";

    private $validHttpMethods = [];
    private $client = null;

    private $logger = null;

    public function __construct(\PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration)
    {
        parent::__construct($configuration);

        $this->validHttpMethods = [self::GET, self::POST, self::PUT, self::PATCH, self::DELETE];

        $this->logger = $this->configuration->getLogger();
    }

    private function handleResponseException($exception)
    {
        $response = $exception->getResponse();
        throw \PacketHost\Client\Exceptions\ResponseExceptions\ResponseExceptionFactory::create($response->getStatusCode(), $response->getBody(), $exception);
    }

    private function handleRequestException($exception, $attempts)
    {
        $request = $exception->getRequest();
        throw \PacketHost\Client\Exceptions\RequestExceptions\RequestExceptionFactory::create($request, $attempts, $exception);
    }

    private function execute($type, $resource, $content, $headers)
    {
        $settings = count($headers)>0 ? ['headers'=>$headers] : [];

        $data  = [];

        //Remove null properties from domain objetcs
        if ($content instanceof \PacketHost\Client\Domain\BaseDomain) {
            $data = $content->toArray();
        } else {
            $data = $content;
        }

        if (isset($headers['Content-Type']) && $headers['Content-Type']  === 'text/plain') {
            $settings['body'] = $data;
        } else {
            $settings['json'] = $data;
        }

        $attempts = 1;
        $request_exception = null;
        do {
            try {
                $start = microtime(true);
                $response = $this->getClient()->{$type}($resource, $settings);
                $time = microtime(true) - $start;
                $this->logInfo($this->build($type, $resource, $attempts, $settings, $time, $response));
                return $this->convertToObjects($response->getBody());
            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $response = $e->getResponse();
                $time = microtime(true) - $start;
                $this->logError($this->build($type, $resource, $attempts, $settings, $time, $response));
                $this->handleResponseException($e);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                //save request for later
                $request_exception = $e;
                //Log error
                $time = microtime(true) - $start;
                $this->logError($this->build($type, $resource, $attempts, $settings, $time, $e->getResponse()));
                //increase attempts
                $attempts++;
                continue;
            }
        } while ($attempts <= self::MAX_ATTEMPTS);
        //If we reach here, there was MAX_ATTEMPTS to reach the api and failed
        $this->handleRequestException($request_exception, $attempts - 1);
    }

    public function get($resource, array $headers = array())
    {
        return $this->execute(self::GET, $resource, null, $headers);
    }

    public function post($resource, $content, array $headers = array())
    {
        return $this->execute(self::POST, $resource, $content, $headers);
    }

    public function patch($resource, $content, array $headers = array())
    {
        return $this->execute(self::PATCH, $resource, $content, $headers);
    }

    public function delete($resource, array $headers = array())
    {
        return $this->execute(self::DELETE, $resource, null, $headers);
    }

    public function put($resource, $content, array $headers = array())
    {
        return $this->execute(self::PUT, $resource, $content, $headers);
    }

    private function convertToObjects($data)
    {
        return json_decode($data);
    }

    private function getClient()
    {

        if (! $this->client) {
            $headers = [
                'Accept' => 'application/json',
            ];

            if ($this->configuration->getAuthToken()) {
                $headers['X-Auth-Token'] = $this->configuration->getAuthToken();
            }

            if ($this->configuration->getConsumerToken()) {
                $headers['X-Consumer-Token'] = $this->configuration->getConsumerToken();
            }

            //Add default header values
            if (is_array($this->configuration->getHeaders()) && count($this->configuration->getHeaders())>0) {
                $headers = array_merge($headers, $this->configuration->getHeaders());
            }
            
            $options = $this->configuration->getOptions();
            if ($options && isset($options['client'])) {
                $this->client = $options['client'];
            } else {
                // Create a client with a base URL
                $this->client = new \GuzzleHttp\Client(
                    [
                        'base_url' => $this->configuration->getEndPoint(),
                        'defaults' => [
                            'headers' => $headers
                        ]
                    ]
                );
            }
            
        }

        return $this->client;
    }

    private function build($type, $resource, $attempts, $settings, $elapsed = 0, $response = null)
    {
        if ($this->logger) {
            $host = $this->configuration->getEndPoint();
            $method = strtoupper($type);
            $duration = round($elapsed * 1000, 2);

            $format = 'application/json';
            $data = json_encode($settings['json']);
            if (isset($settings['headers'])) {
                if (isset($headers['Content-Type']) && $headers['Content-Type']  === 'text/plain') {
                    $format = 'text/plain';
                    $data = $settings['body'];
                }
            }

            $staff = "false";
            $configHeaders = $this->configuration->getHeaders();
            if (isset($configHeaders['X-Packet-Staff'])) {
                $staff = $configHeaders['X-Packet-Staff'] ? "true" : "false";
            }

            $authToken = $this->configuration->getAuthToken();

            $status = 0;
            $error = "";
            if ($response) {
                $status = $response->getStatusCode();
                if ($status < 200 || $status > 299) {
                    $error = $response->getBody();
                    $error = " error={$error}";
                }
            } else {
                $error = " error=Can't connect to {$host}";
            }

            return "API method={$method} path={$resource} attempt={$attempts} status={$status} duration={$duration} format={$format} body={$data} auth-token={$authToken} staff={$staff}{$error}";
        }
        return "";
    }

    private function logInfo($message, $extra = [])
    {
        if ($this->logger) {
            $this->logger->addInfo($message, $extra);
        }
    }

    private function logError($message, $extra = [])
    {
        if ($this->logger) {
            $this->logger->addError($message, $extra);
        }
    }
}
