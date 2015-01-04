<?php namespace Test\PacketHost\Client\Api;

class ProjectTest extends BaseApiTest{

    public function __construct(){

        parent::__construct(\PacketHost\Client\Api\Project::class);

    }

    public function testGetAll()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/', array())
            ->andReturn((object)array("projects"=>[]))
            ->once();
        
        $response = $this->api->getAll();

        $this->assertEquals([], $response);
    }

    public function testGet()
    {
        $this->mock->shouldReceive('get')
            ->with('projects/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->get('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(new \PacketHost\Client\Domain\Project(array()), $response);
    }

    public function testCreate()
    {
        $project = array(
            'name' => 'Test Project'
        );

        $this->mock->shouldReceive('post')
            ->with('projects/', $project, array())
            ->andReturn($project)
            ->once();

        $response = $this->api->create($project);

        $this->assertEquals(new \PacketHost\Client\Domain\Project($project), $response);
    }

    public function testUpdate()
    {
        $project = array(
            'id' => '46e6983f-5c01-4062-88aa-edeb02fcf66c',
            'name' => 'Test Project'
        );

        $this->mock->shouldReceive('patch')
            ->with('projects/46e6983f-5c01-4062-88aa-edeb02fcf66c', $project, array())
            ->andReturn($project)
            ->once();

        $response = $this->api->update('46e6983f-5c01-4062-88aa-edeb02fcf66c', $project);

        $this->assertEquals(new \PacketHost\Client\Domain\Project($project), $response);
    }

    public function testDelete()
    {
        $this->mock->shouldReceive('delete')
            ->with('projects/46e6983f-5c01-4062-88aa-edeb02fcf66c', array())
            ->andReturn(array())
            ->once();

        $response = $this->api->delete('46e6983f-5c01-4062-88aa-edeb02fcf66c');

        $this->assertEquals(array(), $response);
    }
}