<?php namespace Test\PacketHost\Client;

abstract class BaseTest extends \PHPUnit_Framework_TestCase{


    private $adapter = null;
   
    public function __construct(){
        
    }

    protected function setUp(){
        parent::setUp();
    }

    protected function tearDown(){
        parent::tearDown();
    }

    protected function getAdapter(){

        if ( ! $this->adapter ){
            $this->adapter = new \PacketHost\Client\Adapter\GuzzleAdapter( new \PacketHost\Client\Adapter\Configuration\TestConfiguration() ); 
        }

        return $this->adapter;
    }

    


}