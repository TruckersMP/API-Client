# TruckersMP REST API Library

[![Build Status](https://travis-ci.org/TruckersMP/API-Client.svg?branch=master)](https://travis-ci.org/TruckersMP/API-Client)
[![Latest Stable Version](https://poser.pugx.org/truckersmp/api-client/v/stable)](https://packagist.org/packages/truckersmp/api-client)
[![Latest Unstable Version](https://poser.pugx.org/truckersmp/api-client/v/unstable)](https://packagist.org/packages/truckersmp/api-client)
[![License](https://poser.pugx.org/truckersmp/api-client/license)](https://packagist.org/packages/truckersmp/api-client)
[![Monthly Downloads](https://poser.pugx.org/truckersmp/api-client/d/monthly)](https://packagist.org/packages/truckersmp/api-client)
[![Total Downloads](https://poser.pugx.org/truckersmp/api-client/downloads)](https://packagist.org/packages/truckersmp/api-client)


This is a PHP library created to simplify development using the [TruckersMP](http://truckersmp.com/) API. This client library provides functions to connect and gather data from each API endpoint, and returns the data as an object.

> If you want to use the API without a library (or if you have advanced knowledge of PHP), check out our [API documentation](https://stats.truckersmp.com/api).

## Warning!

Please use our service responsibly. People who make lots of requests to our API should contact TruckersMP Staff with a rationale and contact email.


## Requirements  

- PHP 7.1.0 or newer
- Composer

## Installation

This library can be installed using [Composer](http://getcomposer.org/).

Two ways:
1. Execute command `composer require truckersmp/api-client`
2. Add `truckersmp/api-client` manually to the composer requirements list.

After doing either of the above, execute the command `composer install`.

## Usage

> **Please note: this examples doesn't use caching. You should cache your requests in order to use API responsibly. Some examples can be found in `examples\cache` folder.**  

```php
<?php

use TruckersMP/APIClient;

$client = new APIClient();

// Get player data for player id 50
$player = $client->player(50);

// Get player data for player with SteamID 76561197965863564
$player = $client->player(76561197965863564);

// output the user's name
echo $player->name;

// output the user's group
echo $player->groupName;

```

## Methods

`player()` - find player by TruckersMP ID or Steam ID

`bans()` - view bans by TruckersMP ID

`servers()` - servers list

`gameTime()` - gameserver time (uses [Carbon](http://carbon.nesbot.com/docs/))

`version()`- TruckersMP version info

## Configuration

We use [Guzzle](https://github.com/guzzle/guzzle) for gathering data from API endpoint. If you want to change Guzzle [configuration](http://guzzlephp.org/), you can pass config array on Client initialization.

```php
<?php 

$client = new APIClient([
    // Guzzle config
]);
```

All other settings you can find in `APIClient.php` constructor.


## Need Help?

If you have any questions about library usage, you can create a new issue or make a topic on [our forum](https://forum.truckersmp.com/index.php?/forum/198-developer-portal/).
