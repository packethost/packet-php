<?php namespace PacketHost\Client\Domain;

class User extends BaseDomain{
    
    /**
     * @var string
     */
    public $token;
    
    /**
     * @var string
     */
    public $username;
    
    /**
     * @var string
     */
    public $emails = []; // "emails": [ { "address": "melissa@example.com", "default": true },
    
    /**
     * @var string
     */
    public $email;
    
    /**
     * @var string
     */
    public $firstName;
    
    /**
     * @var string
     */
    public $lastName;
    
    /**
     * @var string
     */
    public $fullName;
    
    /**
     * @var string
     */
    public $displayName;

    /**
     * @var string
     */
    public $password;

}