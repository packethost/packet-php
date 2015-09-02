<?php namespace PacketHost\Client\Api\Interfaces;

interface CouponInterface
{
    public function getAll($options = []);

    public function create($data, $options = []);
}
