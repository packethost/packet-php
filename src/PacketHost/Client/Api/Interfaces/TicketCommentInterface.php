<?php namespace PacketHost\Client\Api\Interfaces;

interface TicketCommentInterface{

    public function getAll( $options = "");

    public function create( $data, $options = "");
}