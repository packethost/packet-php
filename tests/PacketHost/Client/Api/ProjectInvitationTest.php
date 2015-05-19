<?php namespace Test\PacketHost\Client\Api;

class ProjectInvitationTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\ProjectInvitation::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invitations/', array())
            ->andReturn((object)array("invitations"=>[]))
            ->once();
        
        $response = $this->api->getAll('c3de2262-7bb6-450b-840e-cf62f66e9bf0');

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invitations/1140617d-262d-4502-a3d6-771d83c930da', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '1140617d-262d-4502-a3d6-771d83c930da');

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation(array()), $response);
    }


    public function testCreate()
    {
        $invitation = array(
            'invitee' => 'pepe@molina.com'
        );

        $this->mock->shouldReceive('post')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invitations/', $invitation, array())
            ->andReturn($invitation)
            ->once();

        $response = $this->api->create('c3de2262-7bb6-450b-840e-cf62f66e9bf0', $invitation);

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation($invitation), $response);
    }

    public function testDelete(){
        $this->mock->shouldReceive('delete')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', [])
            ->andReturn([])
            ->once();

        $response = $this->api->delete('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '379138f1-f389-4ea6-8f2f-518c704bcd6f', []);

        $this->assertEquals([], $response);
    }

    
    public function testUpdate()
    {
        $invitation = array(
            'id' => '379138f1-f389-4ea6-8f2f-518c704bcd6f',
        );

        $this->mock->shouldReceive('patch')
            ->with('projects/c3de2262-7bb6-450b-840e-cf62f66e9bf0/invitations/379138f1-f389-4ea6-8f2f-518c704bcd6f', $invitation, [])
            ->andReturn($invitation)
            ->once();

        $response = $this->api->update('c3de2262-7bb6-450b-840e-cf62f66e9bf0', '379138f1-f389-4ea6-8f2f-518c704bcd6f', $invitation);

        $this->assertEquals(new \PacketHost\Client\Domain\Invitation($invitation), $response);
    }
}
