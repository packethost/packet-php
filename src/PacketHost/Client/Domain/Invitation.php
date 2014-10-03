<?php namespace PacketHost\Client\Domain;

class Invitation extends BaseDomain{

    /**
     * @var string
     */
    public $email;

    /**
     * @var array
     */
    public $roles=[];
    
    /**
     * @var 
     */
    public $project;

    public function __construct(){
        parent::__construct();
    }

}