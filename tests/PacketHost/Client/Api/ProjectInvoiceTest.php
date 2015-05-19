<?php namespace Test\PacketHost\Client\Api;

class ProjectInvoiceTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectInvoice::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invoices/', array())
            ->andReturn((object)array("invoices"=>[]))
            ->once();
        
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invoices/1140617d-262d-4502-a3d6-771d83c930da', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '1140617d-262d-4502-a3d6-771d83c930da');

        $this->assertEquals(new \PacketHost\Client\Domain\Invoice(array()), $response);
    }

}
