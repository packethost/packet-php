<?php namespace PacketHost\Client\Api\Interfaces;

interface PlanInterface {
    
    public function getAll( $options = []);
    
    public function get( $id, $options = []);

}
