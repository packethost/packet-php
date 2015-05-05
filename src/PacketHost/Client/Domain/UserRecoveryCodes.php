<?php namespace PacketHost\Client\Domain;

class UserRecoveryCodes extends BaseDomain
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }
}
