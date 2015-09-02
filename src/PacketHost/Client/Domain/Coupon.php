<?php namespace PacketHost\Client\Domain;

class Coupon extends BaseDomain
{
    public $code;

    public $description;

    public $amount;

    public $beginsAt;

    public $expiresAt;

    public $createdAt;

    public $updateAt;

    public $deletedAt;

    public $usages;
}
