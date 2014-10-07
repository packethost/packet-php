<?php namespace PacketHost\Client\Domain;

class Location extends BaseDomain{

    
    public $slug;
    /**
     * @var string
     */
    public $name;
    
    public $coordinates;
    
    public $features;

}