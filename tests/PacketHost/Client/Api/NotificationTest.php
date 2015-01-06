<?php namespace Test\PacketHost\Client\Api;

class NotificationTest extends BaseTest{

    /**
    * @test
    */
    public function __construct(){

        parent::__construct(\PacketHost\Client\Api\Notification::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('notifications/', array())
            ->andReturn((object)array("notifications"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('notifications/860d6cc7-e42a-4977-83ea-8af1208a3613', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('860d6cc7-e42a-4977-83ea-8af1208a3613');

        $this->assertEquals(new \PacketHost\Client\Domain\Notification(array()), $response);
    }

    public function testUpdate()
    {
        $notification = array(
            'id' => '860d6cc7-e42a-4977-83ea-8af1208a3613',
            'body' => 'test'
        );

        $this->mock->shouldReceive('patch')
            ->with('notifications/860d6cc7-e42a-4977-83ea-8af1208a3613', $notification, array())
            ->andReturn($notification)
            ->once();

        $response = $this->api->update('860d6cc7-e42a-4977-83ea-8af1208a3613', $notification);

        $this->assertEquals(new \PacketHost\Client\Domain\Notification($notification), $response);
    }

}