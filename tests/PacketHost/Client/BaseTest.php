<?php namespace Test\PacketHost\Client;

abstract class BaseTest extends \PHPUnit_Framework_TestCase{


    private $adapter = null;
    private $api = null;
    private $data = null;
    private $onlyRun = false;

    public function __construct( \PacketHost\Client\Api\Interfaces\ApiInterface $api, \PacketHost\Client\Domain\BaseDomain $data ){

        $this->api = $api;
        $this->data = $data;
    }
      
    public function testGetAll(){
 
        $items = $this->api->getAll();

        $this->assertGreaterThan(0, count($items));
    }

    public function testCreate(){
        
        $item = $this->api->create( $this->data );
        
        $this->assertNotNull( $item->id );

        return $item->id;
    }

     /**
     * @depends testCreate
     */
    public function testGet( $id ){
        
        $item = $this->api->get( $id );
        
        $this->assertNotNull( $item->id );

        return $item->id;
    }

    /**
     * @depends testGet
     */
    public function testDelete( $id ){

        $result = $this->api->delete( $id );

        $this->assertEquals($result, true);
    }

    protected function onlyRun( $methods ){
        $this->onlyRun = explode ( ",", $methods );;
    }
 
    protected function setUp(){

        if( $this->onlyRun && ! in_array( $this->getName(), $this->onlyRun ) ) {
            $this->markTestSkipped( $this->getName() );
        }

        parent::setUp();

    }

    protected function tearDown(){
        parent::tearDown();
    }

    protected function getAdapter(){

        if ( ! $this->adapter ){
            $this->adapter = new \PacketHost\Client\Adapter\GuzzleAdapter( new \PacketHost\Client\Adapter\Configuration\TestConfiguration() ); 
        }

        return $this->adapter;
    }

}