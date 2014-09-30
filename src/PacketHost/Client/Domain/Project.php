<?php namespace PacketHost\Client\Domain;

class Project extends BaseDomain{

    /**
     * @var GUID
     */
    public $id;

    /**
     * @var string
     */
    public $name;


    public function __construct(){
        parent::__construct();
    }


}