<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class ResponseExceptionFactory
{
    public static function create( $httpResponseCode, $responseBody)
    {   
        if( $httpResponseCode >= 500 && $httpResponseCode <= 599 )
        {
            throw new ServerResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null );
        }else if( $httpResponseCode >= 400 && $httpResponseCode <= 499 )
        {
            throw new ClientResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null );
        }else{
            //General error message
            throw new BaseResponseException("An error has ocurred", 500, [], null);
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

