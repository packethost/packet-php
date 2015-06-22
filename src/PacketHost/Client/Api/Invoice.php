<?php namespace PacketHost\Client\Api;

class Invoice extends BaseApi implements \PacketHost\Client\Api\Interfaces\InvoiceInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, "invoices/:id", \PacketHost\Client\Domain\Invoice::class, 'invoices');
    }
    
    public function getAll($options = [])
    {
        return $this->getEntities($this->getParams(), $options);
    }
    
    public function get($id, $options = [])
    {
        return $this->getEntity($this->getParams($id), $options);
    }

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }
}
