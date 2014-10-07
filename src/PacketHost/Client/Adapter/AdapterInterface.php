<?php namespace PacketHost\Client\Adapter;

interface AdapterInterface{

    function get( $resource );

    function post( $resource, $content, array $headers = array());

    function delete ( $resource ,array $headers = array()) ;

    function put ( $resource, $content, array $headers = array() ) ;

    function patch ( $resource, $content, array $headers = array() ) ;

}