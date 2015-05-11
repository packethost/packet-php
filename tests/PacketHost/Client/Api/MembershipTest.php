<?php namespace Test\PacketHost\Client\Api;

class MembershipTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\Membership::class);

        $this->AssertNotNull($this->api);
    }

    public function testGet()
    {
        $membership = [
            'id' => '66163167-17e9-449e-8114-6978f60a3a51'
        ];
        $this->mock->shouldReceive('get')
            ->with('memberships/66163167-17e9-449e-8114-6978f60a3a51', [])
            ->andReturn($membership)
            ->once();

        $response = $this->api->get('66163167-17e9-449e-8114-6978f60a3a51');

        $this->assertEquals(new \PacketHost\Client\Domain\Membership($membership), $response);
    }

    public function testDelete(){
        $this->mock->shouldReceive('delete')
            ->with('memberships/66163167-17e9-449e-8114-6978f60a3a51', [])
            ->andReturn([])
            ->once();

        $response = $this->api->delete('66163167-17e9-449e-8114-6978f60a3a51', []);

        $this->assertEquals([], $response);
    }

    public function testUpdate()
    {
        $notification = array(
            'id' => '66163167-17e9-449e-8114-6978f60a3a51',
        );

        $this->mock->shouldReceive('patch')
            ->with('memberships/66163167-17e9-449e-8114-6978f60a3a51', $notification, [])
            ->andReturn($notification)
            ->once();

        $response = $this->api->update('66163167-17e9-449e-8114-6978f60a3a51', $notification);

        $this->assertEquals(new \PacketHost\Client\Domain\Membership($notification), $response);
    }
}
