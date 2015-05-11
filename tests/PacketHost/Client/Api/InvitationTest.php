<?php namespace Test\PacketHost\Client\Api;

class InvitationTest extends BaseTest
{

    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Invitation::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $invitations = new \stdClass();
        $invitations->invitations = [
            ['id'=>'379138f1-f389-4ea6-8f2f-518c704bcd6f'],
            ['id'=>'64c8875b-646b-4c12-ac40-9ff5b5e510df'],
            ['id'=>'a1491bf1-7fec-45f3-b5d5-cf33059262cb'],
        ];
        $this->mock->shouldReceive('get')
            ->with('invitations/', [])
            ->andReturn($invitations)
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals($this->toCollection('\PacketHost\Client\Domain\Invitation', $invitations->invitations), $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', [])
            ->andReturn([])
            ->once();

        $response = $this->api->get('379138f1-f389-4ea6-8f2f-518c704bcd6f');

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation([]), $response);
    }

    public function testCreate()
    {
        $invitation = array(
            'invitee' => 'pepe@molina.com'
        );

        $this->mock->shouldReceive('post')
            ->with('invitations/', $invitation, [])
            ->andReturn($invitation)
            ->once();

        $response = $this->api->create($invitation);

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation($invitation), $response);
    }

    public function testResend()
    {
        $invitation = array(
            'id' => '379138f1-f389-4ea6-8f2f-518c704bcd6f'
        );

        $this->mock->shouldReceive('post')
            ->with('invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', [], [])
            ->andReturn($invitation)
            ->once();

        $response = $this->api->resend('379138f1-f389-4ea6-8f2f-518c704bcd6f',[]);

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation($invitation), $response);
    }

    public function testDelete(){
        $this->mock->shouldReceive('delete')
            ->with('invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', [])
            ->andReturn([])
            ->once();

        $response = $this->api->delete('379138f1-f389-4ea6-8f2f-518c704bcd6f', []);

        $this->assertEquals([], $response);
    }

    public function testUpdate()
    {
        $notification = array(
            'id' => '379138f1-f389-4ea6-8f2f-518c704bcd6f',
            'body' => 'test'
        );

        $this->mock->shouldReceive('patch')
            ->with('invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', $notification, [])
            ->andReturn($notification)
            ->once();

        $response = $this->api->update('379138f1-f389-4ea6-8f2f-518c704bcd6f', $notification);

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation($notification), $response);
    }
}
