<?php namespace PacketHost\Client\Domain;

class Plan extends BaseDomain
{

    /**
     * @var string
     */
    public $slug;

    public $name;

    public $specs;

    public $pricing;

    public $description;

    public $availableIn;
}
