<?php namespace PacketHost\Client\Domain;

class Invitation extends BaseDomain{

    /**
     * @var string
     */
    public $invitee;

    /**
     * @var array
     */
    public $roles=[];
    
    /**
     * @var 
     */
    public $project;

    
    public $invitedBy;
    
    public function __construct(){
        parent::__construct();
    }

}