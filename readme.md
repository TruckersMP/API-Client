# TruckersMP REST API Library

[![Build Status](https://travis-ci.org/TruckersMP/API-Client.svg?branch=master)](https://travis-ci.org/TruckersMP/API-Client)

This is a PHP library created to simplify development using the [TruckersMP](http://truckersmp.com/) API. This client library provides functions to connect and gather data from each API endpoint, and returns the data as an array.

## Requirements  

- PHP 5.6.0 or newer.
- Composer

## Installation

This library can be installed using [Composer](http://getcomposer.org/).

Simple method: You can incluse the library in your composer.json requirements list by using the command `composer require truckersmp/api-client`.

Slightly less simple method: You can also add `truckersmp/api-client` manually to the composer requirements list.

After doing either of the above, open a commandline or terminal in that directory and use the command `composer install`.

## Usage

```
<?php

use TruckersMP/API/APIClient;

// replace with your prefered HTTP Client if you like.
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

$config = [

];
$guzzle = new GuzzleClient($config);
$adapter = new GuzzleAdapter($guzzle);

$this->client = new APIClient($adapter);

// Get player data for player id 50
$player = $client->player(50);

// Get player data for player with SteamID 76561197965863564
$player = $client->player(76561197965863564);

// output the user's name
echo $player->name;

// output the user's group
echo $player->groupName;

```


Please refer to our full [API documentation](https://stats.truckersmp.com/api).

## Tests

To run tests, use `composer test`
