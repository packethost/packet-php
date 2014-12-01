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
    public function __construct( $parameters = [] )
    {

        $this->convert( $parameters );
    }

    /**
     * @param string $property
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function __get( $property )
    {
        if( ! property_exists( $this, $property ) )
        {
            throw new \InvalidArgumentException( sprintf(
                    'Property "%s::%s" does not exist.', get_class( $this ), $property )
            );
        }
    }

    /**
     * @param string $property
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    public function __set( $property, $value )
    {
        if( ! property_exists( $this, $property ) )
        {
            throw new \InvalidArgumentException( sprintf(
                    'Property "%s::%s" should exist.', get_class( $this ), $property )
            );
        }
    }

    /**
     * @param \stdClass|array $parameters
     */
    public function convert( $parameters )
    {
        if ( !$parameters )
            return; 
        
        foreach ($parameters as $property => $value)
        {
            $class = get_called_class();
            $property = Inflector::camelize($property);
            
            if( method_exists( $class, 'set' . $property ) )
            {
                $this->$property( $value );
            } elseif( property_exists( $class, $property ) )
            {
                $this->$property = $value;
            }
        }
    }

    public function toArray(){

        $cloneObj = [];
        foreach($this as $key=>$value){
            //Remove null properties from domain objetcs
            if ( is_null($value) ) { continue; }
            
            $key = Inflector::tableize( $key );
            $cloneObj[$key] = $value;
        }
        
        return $cloneObj;
    }
}
