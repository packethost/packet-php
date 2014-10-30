Packet PHP Library
=================

####Requirements
* PHP Curl Extension
* PHP XSL Extension

## Install with Composer 

```php
 "require": {
        "packethost/packet-php-client": "dev-develop"
    },


"repositories":[
        {
            "type":"git",
            "url": "https://github.com/packethost/packet-php-client.git"
        }
    ],

```

## Using the API


```php



```

## Running the tests

In order to run the tests you need to create a file called "config.json" in your tests dir, with the following content

```javascript

{
    "authToken":"xxxx",
    "consumerToken":"xxxx",
    "endPoint":"http://localhost:3000/"
}


```

## Sending query string parameters and header information 

```php
[
    'queryParams'=>'include=user'
    'header'=>'SomeValue: xxxx'
]
```

