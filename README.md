Packet PHP Library
=================

####Requirements
* PHP Curl Extension
* PHP XSL Extension

## Install with Composer 

```php
 "require": {
        "packethost/packet": "dev-develop"
    },


"repositories":[
        {
            "type":"git",
            "url": "https://github.com/packethost/packet-php.git"
        }
    ],

```

## Using the API


```php



```

## Running the tests


```php
grunt ci

```

## Sending query string parameters and header information 

```php
[
    'queryParams'=>'include=user'
    'header'=>'SomeValue: xxxx'
]
```

