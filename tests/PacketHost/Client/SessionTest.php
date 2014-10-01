<?php namespace Test\PacketHost\Client;

class SessionTest extends BaseTest{

    private $api = null;

    public function testLogin(){

        $login = $this->getApi()->login( new \PacketHost\Client\Domain\Session( 'emiliano@packethost.net', 'test_pass') );

        $this->assertNotNull($login);
    }

    private function getApi(){

        if ( ! $this->api ){
            $this->api = new \PacketHost\Client\Api\Session( $this->getAdapter() );
        }

        return $this->api;
    }

}
 