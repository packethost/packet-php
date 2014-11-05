<?php namespace PacketHost\Client\Api\Interfaces;

interface PaymentMethodInterface {
    
    public function getAll( $options = []);

    public function get( $id, $options = []);

    
}