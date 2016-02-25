<?php namespace PacketHost\Client\Adapter\Configuration;

interface ConfigurationInterface
{

    public function getAuthToken();

    public function getConsumerToken();

    public function getEndPoint();

    public function getHeaders();

    public function getOptions();

    public function getLogger();
}
