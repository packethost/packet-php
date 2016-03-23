<?php namespace Test\PacketHost\Client\Api;

class ProjectUsageTest extends \Test\PacketHost\Client\Api\BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectUsage::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $request['queryParams'] = 'since=2015-06-19T17:55:00Z';

        $this->mock->shouldReceive('get')
            ->with('projects/4813a847-83ae-4339-84bd-4259239165b8/usages/?'.$request['queryParams'], array())
            ->andReturn((object)array("usages"=>[]))
            ->once();
        
        $response = $this->api->getAll('4813a847-83ae-4339-84bd-4259239165b8', $request);

        $this->assertEquals([], $response);
    }
}
