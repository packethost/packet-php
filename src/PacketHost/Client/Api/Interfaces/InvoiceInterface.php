<?php namespace PacketHost\Client\Api\Interfaces;

interface InvoiceInterface
{
    
    public function getAll($options = []);
    
    public function get($id, $options = []);
}
