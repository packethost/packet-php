<?php namespace PacketHost\Client\Adapter\Configuration;

class DefaultConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface {


    public function getAuthToken(){
        return "";
    }

    public function getConsumerToken(){
        return "";
    }

    public function getEndPoint(){
        return "api.packethost.net";
    }

}