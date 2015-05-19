<?php namespace PacketHost\Client\Api;

class Email extends \PacketHost\Client\Api\BaseApi implements \PacketHost\Client\Api\Interfaces\EmailInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'emails/:id', \PacketHost\Client\Domain\Email::class, 'emails');
    }

    public function get($id, $options = "")
    {

        return $this->getEntity($this->getParams($id), $options);
    }

    protected function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }

    public function create($data, $options = "")
    {

        return $this->createEntity($this->getParams(), $data, $options);
    }

    public function update($id, $data, $options = "")
    {

        return $this->updateEntity($this->getParams($id), $data, $options);
    }

    public function delete($id, $options = "")
    {

        return $this->deleteEntity($this->getParams($id), $options);
    }
}
