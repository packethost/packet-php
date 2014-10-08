<?php namespace PacketHost\Client\Domain;

class Event extends BaseDomain{

    /**
     * @var string
     */
    public $message; 

     /**
     * @var string
     */
    public $type; 

     /**
     * @var string
     */
    public $createdAt;


}