<?php namespace PacketHost\Client\Api;

class Invitation extends BaseApi implements \PacketHost\Client\Api\Interfaces\InvitationInterface {

    const ProjectID = "projectId";
    
    public function __construct( \PacketHost\Client\Adapter\AdapterInterface $adapter ){
        parent::__construct( $adapter, "projects/:projectId/invitations/:id", \PacketHost\Client\Domain\Project::class, 'invitations');
    }
    
    public function get( $projectId, $id, $options = ""){

        return $this->getEntity( $this->getParams( $projectId, $id ), $options );
    }

    public function create( $projectId, $data, $options = ""){

        return $this->createEntity( $this->getParams( $projectId ), $data, $options);
    }

    public function delete( $projectId, $id, $options ){

        return $this->deleteEntity( $this->getParams( $projectId, $id ), $options );
    }

    public function update( $projectId, $id, $data, $options = "" ){

        return $this->updateEntity( $this->getParams( $projectId, $id ), $data, $options );
    }
    
    private function getParams($projectId, $id = ""){
        return [
             self::ProjectID => $projectId,
            "id" => $id
        ];
    }
}