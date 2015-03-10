<?php namespace PacketHost\Client\Adapter\Configuration;

class DefaultConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface
{

    private $authToken = "";
    private $consumerToken = "";
    private $headers = [];

    public function __construct($authToken, $consumerToken, $headers = [])
    {

        $this->authToken = $authToken;
        $this->consumerToken = $consumerToken;
        $this->headers = $headers;

    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    public function getConsumerToken()
    {
        return $this->consumerToken;
    }

    public function getEndPoint()
    {
        return "api.packethost.net";
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}
