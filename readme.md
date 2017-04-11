# TruckersMP REST API Library

[![Build Status](https://travis-ci.org/TruckersMP/API-Client.svg?branch=master)](https://travis-ci.org/TruckersMP/API-Client)

This is a PHP library created to simplify development using the [TruckersMP](http://truckersmp.com/) API. This client library provides functions to connect and gather data from each API endpoint, and returns the data as an array.

If you want to use API without library (or if you have advanced knowledge of PHP), you can use it [directly](https://stats.truckersmp.com/api).

## Warning!

Please use our service responsibly. API Consumers who require high rates of requests against our APIs should contact TruckersMP Staff with a rationale and contact email for high-rate usage.


## Requirements  

- PHP 5.6.0 or newer
- Composer

## Installation

This library can be installed using [Composer](http://getcomposer.org/).

Two ways:
1. Execute command `composer require truckersmp/api-client`
2. Add `truckersmp/api-client` manually to the composer requirements list.

After doing either of the above, execute the command `composer install`.

## Usage

Please note, that library uses File cache to take care about responsible API usage.

```php
<?php

use TruckersMP/API/APIClient;

$cachePath = '/cache'; // path to cache folder 
$client = new APIClient($cachePath);

// Get player data for player id 50
$player = $client->player(50);

// Get player data for player with SteamID 76561197965863564
$player = $client->player(76561197965863564);

// output the user's name
echo $player->name;

// output the user's group
echo $player->groupName;

```

## Configuration

APIClient has Cache and Guzzle configuration.

We use [Guzzle](https://github.com/guzzle/guzzle) for gathering data from API endpoint. If you want to change Guzzle [configuration](http://guzzlephp.org/), you can pass config array on Client initialization.

```php
<?php 

$client = new APIClient(); // Cache is disables, Guzzle settings by default

$client = new APIClient($cachePath); // Cache init, Guzzle settings by default

$client = new APIClient($cachePath, []); // Cache init, Guzzle init
```

## Tests

To run tests, use `composer test`
