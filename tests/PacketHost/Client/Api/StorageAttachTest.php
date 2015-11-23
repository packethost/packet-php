<?php namespace Test\PacketHost\Client\Api;

class StorageAttachTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\StorageAttach::class);

        $this->AssertNotNull($this->api);
    }

    public function testCreate()
    {
        $storageId = uniqid();

        $attachDevice = array(
            'device_id' => 'b79c99da-b46f-4dba-a143-804861dc675b'
        );

        $attachments = array(
            'volume' => array('id' => '627602ba-54b9-4fba-94bd-2797e849023b'),
            'device' => array('id' => '627602ba-54b9-4fba-94bd-2797e849022b')
        );

        $this->mock->shouldReceive('post')
            ->with('storage/b79c99da-b46f-4dba-a143-804861dc676c/attachments', $attachDevice, array())
            ->andReturn(array())
            ->once();

        $response = $this->api->create('b79c99da-b46f-4dba-a143-804861dc676c', $attachDevice);

        $this->assertEquals(new \PacketHost\Client\Domain\Attachment(array()), $response);
    }
}
