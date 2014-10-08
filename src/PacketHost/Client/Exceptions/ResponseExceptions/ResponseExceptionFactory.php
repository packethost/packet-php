<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class ResponseExceptionFactory
{
    public static function create( $httpResponseCode, $responseBody)
    {
        $level = $httpResponseCode[0];
        
        if( $level == 5 )
        {
            throw new ServerResponseException($responseBody->error, $httpResponseCode, null );
        }else if( $level == 4 )
        {
            throw new ClientResponseException($responseBody->error, $httpResponseCode, null );
        }
    }
}

