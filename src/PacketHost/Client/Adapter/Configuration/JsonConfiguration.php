<?php namespace PacketHost\Client\Adapter\Configuration;

class JsonConfiguration implements \PacketHost\Client\Adapter\Configuration\ConfigurationInterface {

    private $authToken = "";
    private $consumerToken = "";
    private $endPoint = "";

    public function __construct( $jsonFile ){

        if ( ! file_exists( $jsonFile ) ){
            throw new \Exception ('JSon file configuration doesn\'t exists:'.$jsonFile);
        }

        $content = file_get_contents( $jsonFile );
        $jsonContent = json_decode($content);

        $this->authToken = $jsonContent->authToken;
        $this->consumerToken = $jsonContent->consumerToken;
        $this->endPoint = $jsonContent->endPoint;

    }

    public function getAuthToken(){
        return $this->authToken;
    }

    public function getConsumerToken(){
        return $this->consumerToken;
    }

    public function getEndPoint(){
        return $this->endPoint;
    }

}