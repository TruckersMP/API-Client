<?php

require __DIR__ . '/../vendor/autoload.php';

use TruckersMP\APIClient\Client;

$client = new Client();

try {
    $player = $client->player(11111111111111)->get();
    echo $player->getName();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
