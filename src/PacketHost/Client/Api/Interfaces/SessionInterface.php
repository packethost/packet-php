<?php namespace PacketHost\Client\Api\Interfaces;

interface SessionInterface {
    
    function login( \PacketHost\Client\Domain\Session $session );
}