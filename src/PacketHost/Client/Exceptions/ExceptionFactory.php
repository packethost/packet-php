<?php namespace PacketHost\Client\Exceptions;

class ExceptionFactory extends \Exception
{
    public static function create( $httpResponseCode, $responseBody)
    {
        if($httpResponseCode >= 500 && $httpResponseCode<=510 )
        {
            throw new ServerException($responseBody->error,$httpResponseCode,null );
        }else if($httpResponseCode >= 400 && $httpResponseCode<=499 )
        {
            throw new ClientException($responseBody->error,$httpResponseCode,null );
        }
        
    }
}

