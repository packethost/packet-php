<?php namespace PacketHost\Client\Adapter\Configuration;

interface ConfigurationInterface{

    function getAuthToken();

    function getConsumerToken();

    function getEndPoint();

    function getHeaders();
}