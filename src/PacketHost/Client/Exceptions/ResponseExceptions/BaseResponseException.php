<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;

class BaseResponseException extends \Exception
{

    private $errors = [];
    private $responseBody = "";

    public function __construct($message = "", $code = 0, $errors = [], $responseBody = "", \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
        $this->responseBody = $responseBody;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
