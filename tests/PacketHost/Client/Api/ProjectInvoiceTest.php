<?php namespace Test\PacketHost\Client\Api;

 class ProjectInvoiceTest extends \PHPUnit_Framework_TestCase{

    private $api;
    private $adapterMock;

    public function __construct(){
    
        $this->adapterMock = $this->getMockBuilder('\PacketHost\Client\Adapter\AdapterInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $this->adapterMock->method('get')->willReturn((object)array("invoices"=>[]));

        $this->api = new \PacketHost\Client\Api\ProjectInvoice( $this->adapterMock );
    }

    public function testGetAllSuccess()
    {
        $this->adapterMock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invoices/'));

        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }
}