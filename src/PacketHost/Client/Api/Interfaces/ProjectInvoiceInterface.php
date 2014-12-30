<?php namespace PacketHost\Client\Api\Interfaces;

interface ProjectInvoiceInterface {
    
    public function getAll( $projectId, $options = []);
    
    public function get( $projectId, $id, $options = []);
}
