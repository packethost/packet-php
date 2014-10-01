<?php namespace PacketHost\Client\Adapter;

abstract class BaseAdapter{

    protected $configuration = null;

    public function __construct( \PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration ){
        $this->configuration = $configuration;
    }

}