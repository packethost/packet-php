<?php namespace Test\PacketHost\Client\Exceptions\RequestExceptions;
use \PacketHost\Client\Exceptions\RequestExceptions\RequestExceptionFactory;


class RequestExceptionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \PacketHost\Client\Exceptions\RequestExceptions\BaseRequestException
     */
    public function testCreate(){

        $requestMock = \Mockery::mock('Request');
        $requestMock->shouldReceive('getHost')
            ->once()
            ->andReturn('my-host.com');

        RequestExceptionFactory::create($requestMock);
    }
}
