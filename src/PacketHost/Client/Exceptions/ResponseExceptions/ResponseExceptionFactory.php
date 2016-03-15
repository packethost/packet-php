<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class ResponseExceptionFactory
{
    public static function create($httpResponseCode, $responseBody, $exception = null)
    {
        if ($httpResponseCode >= 500 && $httpResponseCode <= 599) {
            return new ServerResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), $responseBody, $exception);
        } elseif ($httpResponseCode >= 400 && $httpResponseCode <= 499) {
            return new ClientResponseException(self::getError($responseBody), $httpResponseCode, self::getErrors($responseBody), $responseBody, $exception);
        } else {
            //General error message
            return new BaseResponseException("An error has ocurred", 500, [], $responseBody, $exception);
        }
    }

    private static function getError($body)
    {
        $responseBody = json_decode($body, true);
        if (isset($responseBody->errors) && is_array($responseBody->errors) && count($responseBody->errors) > 0) {
            return $responseBody->errors[0];
        } if (isset($responseBody->error)) {
            return $responseBody->error;
        }

        return 'An error has ocurred';
    }

    private static function getErrors($body)
    {
        $responseBody = json_decode($body, true);
        if (isset($responseBody->errors)) {
            return $responseBody->errors;
        }

        return [];
    }
}
