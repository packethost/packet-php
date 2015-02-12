<?php namespace PacketHost\Client\Api\Interfaces;

interface TicketInterface
{

    public function getAll($options = "");

    public function get($id, $options = "");
}
