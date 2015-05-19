<?php namespace Test\PacketHost\Client\Exceptions\ResponseExceptions;
use \PacketHost\Client\Exceptions\ResponseExceptions\ResponseExceptionFactory;


class ResponseExceptionFactoryTest extends \PHPUnit_Framework_TestCase
{
    
    public function testCreateServerExc(){
        $result = ResponseExceptionFactory::create(500, $this->getError());
        $this->assertTrue($result instanceof \PacketHost\Client\Exceptions\ResponseExceptions\ServerResponseException);
    }
    
    public function testCreateClientExc(){
        $result = ResponseExceptionFactory::create(400, $this->getErrors());
        $this->assertTrue($result instanceof \PacketHost\Client\Exceptions\ResponseExceptions\BaseResponseException);
    }

    public function testCreateGeneraltExc(){
        ResponseExceptionFactory::create(600, $this->getErrors());
    }

    private function getErrors(){
        $response = new \stdClass();
        $response->errors = ['Yay!'];

        return $response;
    }

    private function getError(){
        $response = new \stdClass();
        $response->error = 'Yayyyy!';
        return $response;
    }
}
