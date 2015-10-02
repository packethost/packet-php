<?php namespace PacketHost\Client\Exceptions\RequestExceptions;

class RequestExceptionFactory
{
    public static function create($request)
    {
        return new BaseRequestException("Can't connect to {$request->getHost()}", 500, null);
    }
}
