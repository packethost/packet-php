<?php namespace Test\PacketHost\Client;

class TestConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface {

    public function getAuthToken(){
        return "3567c799bffa8fd622596d4184f7977f";
    }

    public function getConsumerToken(){
        return "4190f3e7124ceac9c4646aa5b7dad0d562445a5946990238d396e6a354397d60";
    }

    public function getEndPoint(){
        return "http://localhost/3000";
    }

} 
