<?php namespace Test\PacketHost\Client\Exceptions\ResponseExceptions;


class EntityTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity(){
        $device = new \PacketHost\Client\Domain\Device();
        $device->hostname = 'Testing';

        $this->assertEquals('Testing', $device->hostname);
    }
}
