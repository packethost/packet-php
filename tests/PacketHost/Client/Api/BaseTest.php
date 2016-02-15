<?php namespace Test\PacketHost\Client\Api;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    
    protected $mock;

    protected $api;

    public function __construct($apiClass)
    {
        $this->mock = \Mockery::mock('\PacketHost\Client\Adapter\AdapterInterface');

        $this->api = new $apiClass($this->mock);

    }

    public function tearDown()
    {
        \Mockery::close();
    }

    protected function toCollection($type, $data){
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = new $type($value);
        }
        return $result;
    }

    protected function toArray($data){
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = $this->toArray($value);
            }
            return $result;
        }
    }
}
