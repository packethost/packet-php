<?php namespace Test\PacketHost\Client\Exceptions\RequestExceptions;
use \PacketHost\Client\Exceptions\RequestExceptions\RequestExceptionFactory;


class RequestExceptionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate(){

        $requestMock = \Mockery::mock('Request');
        $requestMock->shouldReceive('getHost')
            ->once()
            ->andReturn('my-host.com');

        $result = RequestExceptionFactory::create($requestMock);
        $this->assertTrue($result instanceof \PacketHost\Client\Exceptions\RequestExceptions\BaseRequestException);
    }
}
