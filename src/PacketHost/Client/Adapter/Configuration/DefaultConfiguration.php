<?php namespace PacketHost\Client\Adapter\Configuration;

class DefaultConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface {

    private $authToken = "";
    private $consumerToken = "";

    public function __construct( $authToken, $consumerToken ){

        $this->authToken = $authToken;
        $this->consumerToken = $consumerToken;

    }

    public function getAuthToken(){
        return $this->authToken;
    }

    public function getConsumerToken(){
        return $this->consumerToken;
    }

    public function getEndPoint(){
        return "api.packethost.net";
    }

}