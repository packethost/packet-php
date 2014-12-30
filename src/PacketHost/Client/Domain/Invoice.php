<?php namespace PacketHost\Client\Domain;

class Invoice extends BaseDomain{

    public $amount;
    public $due_on;
    public $created_at;
    public $updated_at;
    public $paid_at;
    public $via;
    public $details;
    public $project;
}