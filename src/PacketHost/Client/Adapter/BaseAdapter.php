<?php namespace PacketHost\Client\Adapter;

abstract class BaseAdapter{

    protected $configuration = null;
    protected $slug = "";

    public function __construct( \PacketHost\Client\Adapter\Configuration\ConfigurationInterface $configuration, $slug="" ){
        $this->configuration = $configuration;
        $this->slug = $slug;
    }

}