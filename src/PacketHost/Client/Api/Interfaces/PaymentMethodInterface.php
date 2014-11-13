<?php namespace PacketHost\Client\Api\Interfaces;

interface PaymentMethodInterface {
    
    function getAll( $options = []);

    function get( $id, $options = []);

    function delete( $id, $options = [] );

    function update( $id , $paymentMethod, $options = []);
}