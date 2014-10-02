<?php namespace PacketHost\Client\Domain;

class User extends BaseDomain{
    
    public $token;
    public $username;
    public $emails = []; // "emails": [ { "address": "melissa@example.com", "default": true },
    public $first_name; 
    public $last_name;

}