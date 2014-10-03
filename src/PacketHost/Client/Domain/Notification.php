<?php namespace PacketHost\Client\Domain;

class Notification extends BaseDomain{

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $read;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $created_at;

     /**
     * @var string
     */
    public $updated_at;


    public function __construct( ){
        parent::__construct();
    }


}