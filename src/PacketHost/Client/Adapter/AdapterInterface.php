<?php namespace PacketHost\Client\Adapter;

interface AdapterInterface{

    function get( $resource );

    function post( $resource, array $headers = array(), $content = '');

    function delete ( $resource ,array $headers = array()) ;

    function put ( $resource ,array $headers = array(), $content = '') ;

}