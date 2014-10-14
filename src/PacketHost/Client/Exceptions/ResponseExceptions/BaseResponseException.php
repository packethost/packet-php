<?php namespace PacketHost\Client\Exceptions\ResponseExceptions;


class BaseResponseException extends \Exception{
    
    private $errors = [];

    public function __construct( $message = "", $code = 0, $errors=[], \Exception $previous = NULL  ){
        parent::__construct( $message , $code, $previous );

        $this->errors = $errors;
    }
}