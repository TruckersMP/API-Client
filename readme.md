# TruckersMP REST API Library

[![Build Status](https://travis-ci.org/TruckersMP/API-Client.svg?branch=master)](https://travis-ci.org/TruckersMP/API-Client)

This is a PHP library created to simplify development using the [TruckersMP](http://truckersmp.com/) API. This client library provides functions to connect and gather data from each API endpoint, and returns the data as an array.

##Requirements  

- PHP 5.6.0 or newer.

##Installation

This library can be installed using [Composer](http://getcomposer.org/).

Simple method: You can incluse the library in your composer.json requirements list by using the command `composer require truckerspm/api-client`.

Slightly less simple method: You can also add `truckersmp/api-client` manually to the composer requirements list.

After doing either of the above, open a commandline or terminal in that directory and use the command `composer install`.

##Available functions  

All functions are in the truckersmp/tmpapilib class.

Functions follow the naming format  
**`endpointName(Required parameters)`**.  
This means that the servers endpoint can be recieved using the function `servers`, and the player endpoint can be recieved using the function `player(user id)`.

Please refer to our full [API documentation](https://stats.truckersmp.com/api).