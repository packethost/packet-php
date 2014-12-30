<?php namespace PacketHost\Client\Api;

class ProjectInvoice extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectInvoiceInterface {

    
    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "projects/:projectId/invoices/:id", \PacketHost\Client\Domain\ProjectInvoice::class, 'invoices');
    }
    
    public function getAll( $projectId, $options = [])
    {
        return $this->getEntities( $this->getParams($projectId), $options );
    }
    
    public function get(  $projectId, $id, $options = []){

        return $this->getEntity( $this->getParams( $projectId, $id ), $options );
    }

    private function getParams ( $projectId, $id = ""){
        return [
            "projectId" => $projectId,
            "id" => $id
        ];
    }
}