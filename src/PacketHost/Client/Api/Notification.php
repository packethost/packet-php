<?php namespace PacketHost\Client\Api;

class Notification extends BaseApi implements \PacketHost\Client\Api\Interfaces\NotificationInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'notifications/:id', \PacketHost\Client\Domain\Notification::class, 'notifications');
    }

    public function getAll($options = "")
    {

        return $this->getEntities($this->getParams(), $options);
    }


    public function get($id, $options = "")
    {

        return $this->getEntity($this->getParams($id), $options);
    }

    private function getParams($id = "")
    {
        return [
            "id" => $id
        ];
    }

    public function update($id, $data, $options = "")
    {

        return $this->updateEntity($this->getParams($id), $data, $options);

    }
}
