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
            $this->adapter = new \PacketHost\Client\Adapter\GuzzleAdapter('3567c799bffa8fd622596d4184f7977f', '4190f3e7124ceac9c4646aa5b7dad0d562445a5946990238d396e6a354397d60'); 
        }

        return $this->adapter;
    }

    


}