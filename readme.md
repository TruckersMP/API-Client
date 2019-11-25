# TruckersMP REST API Library

[![Build Status](https://travis-ci.org/TruckersMP/API-Client.svg?branch=master)](https://travis-ci.org/TruckersMP/API-Client)
[![Latest Stable Version](https://poser.pugx.org/truckersmp/api-client/v/stable)](https://packagist.org/packages/truckersmp/api-client)
[![Latest Unstable Version](https://poser.pugx.org/truckersmp/api-client/v/unstable)](https://packagist.org/packages/truckersmp/api-client)
[![License](https://poser.pugx.org/truckersmp/api-client/license)](https://packagist.org/packages/truckersmp/api-client)
[![Monthly Downloads](https://poser.pugx.org/truckersmp/api-client/d/monthly)](https://packagist.org/packages/truckersmp/api-client)
[![Total Downloads](https://poser.pugx.org/truckersmp/api-client/downloads)](https://packagist.org/packages/truckersmp/api-client)


This is a PHP library created to simplify development using the [TruckersMP](http://truckersmp.com/) API. 
This library provides functions to connect and gather data from each API endpoint, and returns the data as a class with getting functions.

> If you want to use the API without a library (or if you have advanced knowledge of PHP), check out our [API documentation](https://stats.truckersmp.com/api).

## Warning!

Please use our service responsibly. People who make lots of requests to our API should contact TruckersMP Staff with a rationale and contact email.


## Requirements  

- PHP 7.2.0 or newer
- Composer

## Installation

This library can be installed using [Composer](http://getcomposer.org/).

Two ways:
1. Execute command `composer require truckersmp/api-client`
2. Add `truckersmp/api-client` manually to the composer requirements list.

After doing either of the above, execute the command `composer install`.

## Usage

> **Please note: this example doesn't use caching. You should cache your requests in order to use API responsibly. Some examples can be found in `examples\cache` folder.**  

```php
<?php

use TruckersMP\Client;

$client = new Client();

// Get player data for player id 50
$player = $client->player(50);

// Get player data for player with SteamID 76561197965863564
$player = $client->player(76561197965863564);

// output the user's name
echo $player->getName();

// output the user's group
echo $player->getGroupName();

```

## Methods

All timestamps in this project return a [Carbon](http://carbon.nesbot.com/docs/) class.

- `player(int $id): PlayerModel` - Get player info by either TruckersMP ID or Steam ID
- `bans(int $id): BansModel` - Get bans for a player by player ID
- `servers(): ServersModel` - Get a list of servers
- `gameTime(): GameTimeModel` - Get the server time
- `version(): VersionModel`- *DEPRECATED* Get the TruckersMP version info
- `rules(): RulesModel` - Get the TruckersMP rules

## Models

### BanModel Methods
- `getExpirationDate(): ?Carbon`
- `getCreatedDate(): Carbon`
- `isActive(): bool`
- `getReason(): string`
- `getAdminName(): string`
- `getAdminID(): int`

### BansModel
Contains an array of BanModels.

### GameTimeModel Methods
- `getTime(): Carbon`

### PlayerModel Methods
- `getId(): int`
- `getName(): string`
- `getAvatar(): string`
- `getJoinDate(): Carbon`
- `getSteamID64(): string`
- `getGroupID(): int`
- `isBanned(): bool`
- `getBannedUntil(): bool`
- `hasBansHidden(): bool`
- `getGroupName(): string`
- `isAdmin(): bool`

### RulesModel Methods
- `getRules(): string`
- `getRevision(): int`

### ServerModel Methods
- `getId(): int`
- `getGame(): string`
- `getIp(): string`
- `getPort(): int`
- `getName(): string`
- `getShortName(): string`
- `getIdPrefix(): string`
- `isOnline(): bool`
- `getPlayers(): int`
- `getQueue(): int`
- `getMaxPlayers(): int`
- `getDisplayOrder(): int`
- `hasSpeedLimit(): bool`
- `hasCollisions(): bool`
- `canPlayersHaveCars(): bool`
- `canPlayersHavePoliceCars(): bool`
- `isAfkEnabled(): bool`
- `isEvent(): bool`
- `isSpecialEvent(): bool`
- `isPromods(): bool`
- `hasSyncDelay(): bool`

### ServersModel
Contains an array of ServerModels.

### VersionModel
- `getVersion(): stdClass`
- `getChecksum(): stdClass`
- `getReleased(): Carbon`
- `getSupport(): stdClass`

## Configuration

We use [Guzzle](https://github.com/guzzle/guzzle) to get data from an API endpoint. If you want to change the Guzzle [configuration](http://guzzlephp.org/) then you can pass config array during Client intialization.

You can also pass a second parameter to specify `HTTP` (false) or `HTTPS` (true) requests. This is true by default.

```php
<?php 

$shouldUseHTTPS = true;

$client = new APIClient([
    // Guzzle config
], $shouldUseHTTPS);
```

All other settings you can find in `APIClient.php` constructor.


## Need Help?

If you have any questions about library usage, you can create a new issue or make a topic on [our forum](https://forum.truckersmp.com/index.php?/forum/198-developer-portal/).
