<?php namespace Test\PacketHost\Client;

class SessionTest extends BaseTest{

    private $api = null;

    public function __construct(){


        $session = new \PacketHost\Client\Domain\Session( 'emiliano@packethost.net', 'test_pass') ;

        parent::__construct( new \PacketHost\Client\Api\Session( $this->getAdapter() ),$session );

        $this->onlyRun('testCreate, testGet');
    }


}
 