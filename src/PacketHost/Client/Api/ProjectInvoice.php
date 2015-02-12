<?php namespace PacketHost\Client\Api;

class ProjectInvoice extends BaseApi implements \PacketHost\Client\Api\Interfaces\ProjectInvoiceInterface
{

    const PROJECTID = "projectId";
    
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'projects/:projectId/invoices/:id', \PacketHost\Client\Domain\Invoice::class, 'invoices');
    }

    public function getAll($projectId, $options = "")
    {

        return $this->getEntities($this->getParams($projectId), $options);
    }


    public function get($projectId, $id, $options = "")
    {

        return $this->getEntity($this->getParams($projectId, $id), $options);
    }

    private function getParams($projectId, $id = "")
    {
        return [
            self::PROJECTID => $projectId,
            "id" => $id
        ];
    }
}
