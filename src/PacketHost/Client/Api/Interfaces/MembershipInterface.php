<?php namespace PacketHost\Client\Api\Interfaces;

interface MembershipInterface
{
    
    public function get($id, $options = "");

    public function delete($id, $options = "");

    public function update($id, $data, $options = "");
}
