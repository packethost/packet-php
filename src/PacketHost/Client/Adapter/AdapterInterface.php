<?php namespace PacketHost\Client\Adapter;

interface AdapterInterface
{
    public function get($resource, array $headers = array());

    public function post($resource, $content, array $headers = array());

    public function delete($resource, array $headers = array());

    public function put($resource, $content, array $headers = array());

    public function patch($resource, $content, array $headers = array());
}
