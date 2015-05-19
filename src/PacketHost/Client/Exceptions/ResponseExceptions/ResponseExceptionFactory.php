<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class ResponseExceptionFactory
{
    public static function create($httpResponseCode, $responseBody)
    {
        if ($httpResponseCode >= 500 && $httpResponseCode <= 599) {
            return new ServerResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null);
        } elseif ($httpResponseCode >= 400 && $httpResponseCode <= 499) {
            return new ClientResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), null);
        } else {
            //General error message
            return new BaseResponseException("An error has ocurred", 500, [], null);
        }
    }

    private static function getError($responseBody)
    {
        if (isset($responseBody->errors)) {
            return $responseBody->errors[0];
        } if (isset($responseBody->error)) {
            return $responseBody->error;
        }

        return 'No error :(';
    }

    private static function getErrors($responseBody)
    {
        if (isset($responseBody->errors)) {
            return $responseBody->errors;
        }

        return [];
    }
}
