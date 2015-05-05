<?php namespace PacketHost\Client\Api\Interfaces;

interface UserRecoveryCodesInterface
{
    public function getAll($options = []);

    public function create($options = []);
}
