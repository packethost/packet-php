<?php namespace PacketHost\Client\Domain;

use \Doctrine\Common\Inflector\Inflector;

abstract class BaseDomain
{

    /**
     * @var GUID
     */
    public $id;
    
    /**
     * @var string
     */
    public $href;
    
    /**
     * @var string
     */
    public $createdAt;
    
    /**
     * @var string
     */
    public $updatedAt;
    
    /**
     * @param \stdClass|array $parameters
     */
    public function __construct($parameters = [])
    {

        $this->convert($parameters);
    }

    /**
     * @param \stdClass|array $parameters
     */
    public function convert($parameters)
    {
        if (!$parameters) {
            return;
        }
        
        foreach ($parameters as $property => $value) {
            $class = get_called_class();
            $property = Inflector::camelize($property);
            
            if (property_exists($class, $property)) {
                $this->$property = $value;
            }
        }
    }

    public function toArray()
    {

        $cloneObj = [];
        foreach ($this as $key => $value) {
            //Remove null properties from domain objetcs
            if (is_null($value)) {
                continue;
            }
            
            $key = Inflector::tableize($key);
            $cloneObj[$key] = $value;
        }
        
        return $cloneObj;
    }
}
