Packet PHP Library
=================

[![Build Status](https://api.shippable.com/projects/54599803a85d45d063d9048a/badge?branchName=master)](https://app.shippable.com/projects/54599803a85d45d063d9048a/builds/latest)

####Requirements
* PHP Curl Extension
* PHP XSL Extension

## Install with Composer 

```
 "require": {
        "packethost/packet": "dev-master"
    },

```

## How to use it

```
<?php

require __DIR__ . '/vendor/autoload.php';

//Create a configuration object
$config = new PacketHost\Client\Adapter\Configuration\DefaultConfiguration(
    'YOUR_API_KEY'
);

//Build the adapter
$adapter = new PacketHost\Client\Adapter\GuzzleAdapter($config);

// Getting All projects
$projectsApi = new PacketHost\Client\Api\Project($adapter);

var_dump($projectsApi->getAll());


// Creating a device
$device = new \PacketHost\Client\Domain\Device();

$projectId = 'PROJECT_ID';

$device->hostname = 'sample';
$device->facility = 'ewr1';
$device->plan = 'baremetal_0';
$device->operatingSystem = 'debian_8';

$devicesApi = new PacketHost\Client\Api\Device($adapter);

$device = $devicesApi->create($projectId, $device);

var_dump($device);

```

## Running the tests


```php
grunt ci

```


