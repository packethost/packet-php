<?php namespace Test\PacketHost\Client;

class UserTest extends BaseTest{

    private $api = null;

    public function __construct(){

        $user = new \PacketHost\Client\Domain\User() ;
        $user->first_name = "Testing";
        $user->last_name="PHP Client";
        $user->password = "testing";
        $user->emails = [
                            ['address'=>'testing@phpclient.com', 'default'=>true]
                        ];

        parent::__construct( new \PacketHost\Client\Api\User( $this->getAdapter() ),$user );

        // $this->onlyRun('testCreate, testGet');
    }


}
