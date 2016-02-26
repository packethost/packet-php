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

//Build the adapter and Api
$adapter = new PacketHost\Client\Adapter\GuzzleAdapter($config);
$api = new PacketHost\Client\PacketApi($adapter);

// Fetching projects
$projects = $api->project()->getAll();
var_dump($projects);

// Fetching facilities
$facilities = $api->facility()->getAll();

// Fetching Operating Systems
$oses = $api->operatingSystem()->getAll();

// Fetching Plans
$plans = $api->plan()->getAll();

// Creating a device
$device = new \PacketHost\Client\Domain\Device();

$projectId = 'PROJECT_ID';

$device->hostname = 'sample';
$device->facility = $facilities[0]->code;
$device->plan = $plans[0]->slug;
$device->operatingSystem = $oses[0]->slug;

$device = $api->device()->create($projectId, $device);

var_dump($device);

```

## Running the tests


```php
grunt ci

```


