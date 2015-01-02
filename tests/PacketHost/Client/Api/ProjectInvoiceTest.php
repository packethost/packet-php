<?php namespace Test\PacketHost\Client\Api;

 class ProjectInvoiceTest extends \PHPUnit_Framework_TestCase{

    private $api;

    public function __construct(){
    
        $this->api = new \PacketHost\Client\Api\ProjectInvoice( new \PacketHost\Client\Adapter\GuzzleAdapter( new \PacketHost\Client\Adapter\Configuration\JsonConfiguration( $this->getFileConfiguration()) ) );
    }

    private function getFileConfiguration(){
        $path = str_replace('PacketHost/Client/Api','',__DIR__)."config.json";
        return $path;
    }

    public function testGetAllSuccess()
    {
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }

    /**
     * @expectedException \PacketHost\Client\Exceptions\ResponseExceptions\ClientResponseException
     */
    public function testGetAllNotFound()
    {
        
        $response = $this->api->getAll('not-found');
    }
}