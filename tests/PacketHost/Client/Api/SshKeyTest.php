<?php namespace Test\PacketHost\Client\Api;

class SshKeyTest extends BaseTest
{

    /**
    * @test
    */
    public function __construct()
    {
        parent::__construct(\PacketHost\Client\Api\SshKey::class);

        $this->AssertNotNull($this->api);
    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('ssh-keys/', array())
            ->andReturn((object)array("ssh_keys"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('ssh-keys/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(new \PacketHost\Client\Domain\SshKey(array()), $response);
    }

    public function testCreate()
    {
        $sshKey = array(
            'label' => 'Test Key'
        );

        $this->mock->shouldReceive('post')
            ->with('ssh-keys/', $sshKey, array())
            ->andReturn($sshKey)
            ->once();

        $response = $this->api->create($sshKey);

        $this->assertEquals(new \PacketHost\Client\Domain\SshKey($sshKey), $response);
    }

    public function testUpdate()
    {
        $sshKey = array(
            'id' => '46e6983f-5c01-4062-88aa-edeb02fcf66c',
            'label' => 'Test Key'
        );

        $this->mock->shouldReceive('patch')
            ->with('ssh-keys/46e6983f-5c01-4062-88aa-edeb02fcf66c', $sshKey, array())
            ->andReturn($sshKey)
            ->once();

        $response = $this->api->update('46e6983f-5c01-4062-88aa-edeb02fcf66c', $sshKey);

        $this->assertEquals(new \PacketHost\Client\Domain\SshKey($sshKey), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('ssh-keys/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}
