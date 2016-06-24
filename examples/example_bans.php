<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use TruckersMP\API\APIClient;

$client = new APIClient;
$bans = $client->bans(50);


echo "<h1>Ban reasons:</h1>";
foreach ($bans as $ban)
{
    printf('<p>Banned by: %s <br/>', $ban->adminName);
    printf('Reason: %s<br />', $ban->reason);
    printf('At: %s<br />', $ban->created);
    printf('Until: %s</p>', $ban->expires);
}

