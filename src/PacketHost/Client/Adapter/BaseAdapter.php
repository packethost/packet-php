<?php namespace PacketHost\Client\Adapter;

abstract class BaseAdapter{

    protected $authToken = null;

    protected $consumerToken = null;

    public function __construct( $authToken, $consumerToken ){
        $this->authToken = $authToken;
        $this->consumerToken = $consumerToken;
    }

}