<?php namespace PacketHost\Client;

class PacketApi{

    /**
     * @var \PacketHost\Client\Adapter\AdapterInterface
     */
    private $adapter;

    /**
     * @var Array
     */
    private $apis = [];

    /**
     * @param PacketHost\Client\Adapter\AdapterInterface $adapter 
     */
    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){

        $this->adapter = $adapter;

    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function invitation(){
        return $this->factory(\PacketHost\Client\Api\Invitation::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function notification(){
        return $this->factory(\PacketHost\Client\Api\Notification::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function project(){
        return $this->factory(\PacketHost\Client\Api\Project::class);
    }
      
    /**
     * @return \PacketHost\Client\Api\Invitation
     */  
    public function session(){
        return $this->factory(\PacketHost\Client\Api\Session::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function user(){
        return $this->factory(\PacketHost\Client\Api\User::class);
    }
    
    /**
     * @return \PacketHost\Client\Api\PaymentMethod
     */
    public function paymentMethod(){
        return $this->factory(\PacketHost\Client\Api\PaymentMethod::class);
    }
    
    /**
     * @return \PacketHost\Client\Api\Membership
     */
    public function membership(){
        return $this->factory(\PacketHost\Client\Api\Membership::class);
    }
    
    /**
     * @return \PacketHost\Client\Api\Ticket
     */
    public function ticket(){
        return $this->factory(\PacketHost\Client\Api\Ticket::class);
    }
    
    /**
     * @return \PacketHost\Client\Api\Comment
     */
    public function comment(){
        return $this->factory(\PacketHost\Client\Api\Comment::class);
    }

    /**
     * @return \PacketHost\Client\Api\ApiInterface
     */
    private function factory( $class ){

        if ( ! isset($apis[$class] )){
            $apis[$class] = new $class($this->adapter);
        }

        return $apis[$class];

    }


}