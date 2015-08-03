<?php namespace PacketHost\Client\Domain;

class Invoice extends BaseDomain
{
    public $number;
    public $amount;
    public $balance;
    public $currency;
    public $targetDate;
    public $createdOn;
    public $project;
    public $items;
    public $creditAmount;
}
