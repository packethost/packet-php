<?php namespace Test\PacketHost\Client\Api;

abstract class BaseTest extends \PHPUnit_Framework_TestCase{
    
    protected $mock;

    protected $api;

    public function __construct( $apiClass )
    {
        $this->mock = \Mockery::mock('\PacketHost\Client\Adapter\AdapterInterface');

        $this->api = new $apiClass( $this->mock);
    }

    public function tearDown()
    {
        \Mockery::close();
    }

}