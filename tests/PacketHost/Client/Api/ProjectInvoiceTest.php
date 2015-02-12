<?php namespace Test\PacketHost\Client\Api;

class ProjectInvoiceTest extends \PHPUnit_Framework_TestCase
{

    private $api;
    private $adapterMock;

    /**
    * @test
    */
    public function __construct()
    {
    
        $this->adapterMock = $this->getMockBuilder('\PacketHost\Client\Adapter\AdapterInterface')
            ->disableOriginalConstructor()
            ->getMock();

        
        $this->api = new \PacketHost\Client\Api\ProjectInvoice($this->adapterMock);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->adapterMock->method('get')->willReturn((object)array("invoices"=>[]));

        $this->adapterMock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invoices/'));

        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->adapterMock->method('get')->willReturn(array());

        $this->adapterMock->expects($this->once())
                 ->method('get')
                 ->with($this->equalTo('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invoices/1140617d-262d-4502-a3d6-771d83c930da'));

        $response = $this->api->get('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '1140617d-262d-4502-a3d6-771d83c930da');

        $this->assertEquals(new \PacketHost\Client\Domain\Invoice(array()), $response);
    }
}
