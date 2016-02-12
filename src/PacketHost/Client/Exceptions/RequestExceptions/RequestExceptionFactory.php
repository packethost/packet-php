<?php namespace PacketHost\Client\Exceptions\RequestExceptions;

class RequestExceptionFactory
{
    public static function create($request, $attempts = 1)
    {
        return new BaseRequestException("Can't connect to {$request->getHost()} ({$attempts})", 500, null);
    }
}
