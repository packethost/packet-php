<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class ResponseExceptionFactory
{
    public static function create( $httpResponseCode, $responseBody)
    {
        $level = $httpResponseCode[0];
        
        if( $level == 5 )
        {
            throw new ServerResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null );
        }else if( $level == 4 )
        {
            throw new ClientResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null );
        }
    }

    private static function getError( $responseBody ){
        if ( isset($responseBody->errors) ){
            return $responseBody->errors[0];
        }

        return $responseBody->error;
    }

    private static function getErrors( $responseBody ){
        if ( isset($responseBody->errors) ){
            return $responseBody->errors;
        }

        return [];
    }
}

