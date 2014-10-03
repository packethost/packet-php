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
    public $created_at;
    
    /**
     * @var string
     */
    public $updated_at;
    
    /**
     * @param \stdClass|array $parameters
     */
    public function __construct( $parameters )
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
        foreach ($parameters as $property => $value)
        {
            if( method_exists( get_called_class(), 'set' . $property ) )
            {
                // To complatible with php =< 5.4
                $property = 'set' . $property;
                $this->$property( $value );
            } else
            {
                $this->$property = $value;
            }
        }
    }
}
