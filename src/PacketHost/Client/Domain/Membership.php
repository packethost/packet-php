<?php namespace PacketHost\Client\Domain;

class Membership extends BaseDomain
{

    /**
     * @var
     */
    public $user;

    /**
     * @var array
     */
    public $roles=[];
    
    /**
     * @var
     */
    public $project;
}
