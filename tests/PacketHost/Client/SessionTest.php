<?php namespace Test\PacketHost\Client;

class SessionTest extends BaseTest{

    private $api = null;

    public function testLogin(){
        $session = new \PacketHost\Client\Domain\Session();
        $session->login = 'emiliano@packethost.net';
        $session->password = 'test_pass';

        $login = $this->getApi()->login( $session );

        $this->assertNotNull($login);
    }
   

    private function getApi(){

        if ( ! $this->api ){
            $this->api = new \PacketHost\Client\Api\Session( $this->getAdapter() );
        }

        return $this->api;
    }


}
 