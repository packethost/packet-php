<?php namespace PacketHost\Client\Adapter\Configuration;

class DefaultConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface
{
    private $authToken      = "";
    private $consumerToken  = "";
    private $headers        = [];
    private $options        = [];
    private $logger         = null;

    public function __construct($authToken, $consumerToken = "", $headers = [], $options = [], $logger = null)
    {
        $this->authToken = $authToken;
        $this->consumerToken = $consumerToken;
        $this->headers = $headers;
        $this->options = $options;
        $this->logger = $logger;
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
        return "https://api.packet.net";
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getLogger()
    {
        return $this->logger;
    }
}
