<?php namespace Test\PacketHost\Client;

class NotificationTest extends \Test\PacketHost\Client\BaseTest{
    
    public function __construct(){

        $notification = new \PacketHost\Client\Domain\Notification();
        $notification->body = "This is a notification!";
        $notification->read = false;

        parent::__construct(new \PacketHost\Client\Api\Notification( $this->getAdapter() ), $notification );

        $this->onlyRun('testGetAll');
    }

}