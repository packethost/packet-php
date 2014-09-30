<?php namespace PacketHost\Client\Api;

abstract class BaseApi{

    protected $adapter;

    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        
        $this->adapter = $adapter;
       
    }

}