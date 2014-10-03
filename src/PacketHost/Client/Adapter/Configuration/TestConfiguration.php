<?php namespace PacketHost\Client\Adapter\Configuration;

class TestConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface {

    public function getAuthToken(){
        return "c159ea6e21c061ccace39990a45e8e83";
    }

    public function getConsumerToken(){
        return "4190f3e7124ceac9c4646aa5b7dad0d562445a5946990238d396e6a354397d60";
    }

    public function getEndPoint(){
        return "http://localhost:3000/";
    }

} 
