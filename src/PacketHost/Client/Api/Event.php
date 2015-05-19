<?php namespace PacketHost\Client\Api;

class Event extends BaseApi implements \PacketHost\Client\Api\Interfaces\EventInterface
{

    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'events/:id', \PacketHost\Client\Domain\Event::class, 'events');
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
