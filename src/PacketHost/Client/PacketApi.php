<?php namespace PacketHost\Client;

class PacketApi
{

    /**
     * @var \PacketHost\Client\Adapter\AdapterInterface
     */
    private $adapter;

    /**
     * @var Array
     */
    private $apis = [];

    /**
     * @param PacketHost\Client\Adapter\AdapterInterface $adapter
     */
    public function __construct(\PacketHost\Client\Adapter\AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return \PacketHost\Client\Api\Application
     */
    public function application()
    {
        return $this->factory(\PacketHost\Client\Api\Application::class);
    }

    /**
     * @return \PacketHost\Client\Api\Coupon
     */
    public function coupon()
    {
        return $this->factory(\PacketHost\Client\Api\Coupon::class);
    }

    /**
     * @return \PacketHost\Client\Api\Device
     */
    public function device()
    {
        return $this->factory(\PacketHost\Client\Api\Device::class);
    }

    /**
     * @return \PacketHost\Client\Api\DeviceEvent
     */
    public function deviceEvent()
    {
        return $this->factory(\PacketHost\Client\Api\DeviceEvent::class);
    }

    /**
     * @return \PacketHost\Client\Api\DeviceIp
     */
    public function deviceIp()
    {
        return $this->factory(\PacketHost\Client\Api\DeviceIp::class);
    }

    /**
     * @return \PacketHost\Client\Api\DeviceTraffic
     */
    public function deviceTraffic()
    {
        return $this->factory(\PacketHost\Client\Api\DeviceTraffic::class);
    }

    /**
     * @return \PacketHost\Client\Api\DeviceUsage
     */
    public function deviceUsage()
    {
        return $this->factory(\PacketHost\Client\Api\DeviceUsage::class);
    }

    /**
     * @return \PacketHost\Client\Api\Email
     */
    public function email()
    {
        return $this->factory(\PacketHost\Client\Api\Email::class);
    }

    /**
     * @return \PacketHost\Client\Api\Event
     */
    public function event()
    {
        return $this->factory(\PacketHost\Client\Api\Event::class);
    }

    /**
     * @return \PacketHost\Client\Api\Facility
     */
    public function facility()
    {
        return $this->factory(\PacketHost\Client\Api\Facility::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function invitation()
    {
        return $this->factory(\PacketHost\Client\Api\Invitation::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invoice
     */
    public function invoice()
    {
        return $this->factory(\PacketHost\Client\Api\Invoice::class);
    }

    /**
     * @return \PacketHost\Client\Api\IpAddress
     */
    public function ipAddress()
    {
        return $this->factory(\PacketHost\Client\Api\IpAddress::class);
    }

    /**
     * @return \PacketHost\Client\Api\Membership
     */
    public function membership()
    {
        return $this->factory(\PacketHost\Client\Api\Membership::class);
    }

    /**
     * @return \PacketHost\Client\Api\Invitation
     */
    public function notification()
    {
        return $this->factory(\PacketHost\Client\Api\Notification::class);
    }

    /**
     * @return \PacketHost\Client\Api\OperatingSystem
     */
    public function operatingSystem()
    {
        return $this->factory(\PacketHost\Client\Api\OperatingSystem::class);
    }

    /**
     * @return \PacketHost\Client\Api\Plan
     */
    public function plan()
    {
        return $this->factory(\PacketHost\Client\Api\Plan::class);
    }

    /**
     * @return \PacketHost\Client\Api\Profile
     */
    public function profile()
    {
        return $this->factory(\PacketHost\Client\Api\Profile::class);
    }

    /**
     * @return \PacketHost\Client\Api\Project
     */
    public function project()
    {
        return $this->factory(\PacketHost\Client\Api\Project::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectEvent
     */
    public function projectEvent()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectEvent::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectInvitation
     */
    public function projectInvitation()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectInvitation::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectInvoice
     */
    public function projectInvoice()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectInvoice::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectIp
     */
    public function projectIp()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectIp::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectStorage
     */
    public function projectStorage()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectStorage::class);
    }

    /**
     * @return \PacketHost\Client\Api\ProjectTransferRequest
     */
    public function projectTransferRequest()
    {
        return $this->factory(\PacketHost\Client\Api\ProjectTransferRequest::class);
    }

    /**
     * @return \PacketHost\Client\Api\SshKey
     */
    public function sshKey()
    {
        return $this->factory(\PacketHost\Client\Api\SshKey::class);
    }

    /**
     * @return \PacketHost\Client\Api\Storage
     */
    public function storage()
    {
        return $this->factory(\PacketHost\Client\Api\Storage::class);
    }

    /**
     * @return \PacketHost\Client\Api\StorageAttach
     */
    public function storageAttach()
    {
        return $this->factory(\PacketHost\Client\Api\StorageAttach::class);
    }

    /**
     * @return \PacketHost\Client\Api\StorageDetach
     */
    public function storageDetach()
    {
        return $this->factory(\PacketHost\Client\Api\StorageDetach::class);
    }

    /**
     * @return \PacketHost\Client\Api\StorageEvent
     */
    public function storageEvent()
    {
        return $this->factory(\PacketHost\Client\Api\StorageEvent::class);
    }

    /**
     * @return \PacketHost\Client\Api\StorageSnapshot
     */
    public function storageSnapshot()
    {
        return $this->factory(\PacketHost\Client\Api\StorageSnapshot::class);
    }

    /**
     * @return \PacketHost\Client\Api\StorageSnapshotPolicy
     */
    public function storageSnapshotPolicy()
    {
        return $this->factory(\PacketHost\Client\Api\StorageSnapshotPolicy::class);
    }

    /**
     * @return \PacketHost\Client\Api\User
     */
    public function user()
    {
        return $this->factory(\PacketHost\Client\Api\User::class);
    }

    /**
     * @return \PacketHost\Client\Api\UserCredits
     */
    public function userCredits()
    {
        return $this->factory(\PacketHost\Client\Api\UserCredits::class);
    }

    /**
     * @return \PacketHost\Client\Api\UserData
     */
    public function userData()
    {
        return $this->factory(\PacketHost\Client\Api\UserData::class);
    }

    /**
     * @return \PacketHost\Client\Api\ApiInterface
     */
    private function factory($class)
    {
        if (! isset($apis[$class])) {
            $apis[$class] = new $class($this->adapter);
        }

        return $apis[$class];
    }
}
