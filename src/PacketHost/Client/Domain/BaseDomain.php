<?php namespace PacketHost\Client\Domain;

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
            $property = $this->toCamelCase($property);
            
            if( method_exists( $class, 'set' . $property ) )
            {
                $this->$property( $value );
            } elseif( property_exists( $class, $property ) )
            {
                $this->$property = $value;
            }
        }
    }
    
    private function toCamelCase($property){
        return lcfirst(preg_replace_callback(
            '/(^|_)([a-z])/',
            function ($match) {
                return strtoupper($match[2]);
            },
            $property
        ));
    }

    private function fromCamelCase($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
        $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    public function toArray(){

        //Remove null properties from domain objetcs
        $props = array_filter((array) $this);

        $cloneObj = [];
        foreach($props as $key=>$value){
            $key = $this->fromCamelCase( $key );
            $cloneObj[$key] = $value;
        }

        return $cloneObj;
    }
}
