<?php
require_once("../src/tmpapilib.php"); //Include the library file.

use truckersmp\tmpapilib as truckersmp; //Tell PHP to use the library namespace.

$api = new truckersmp(); //Load the class into a variable, as defined by "use" above.

$playerbans = $api->bans(1); //Use the class variable to access one of the class functions, loading the player with ID 1. Also works with SteamID64.

echo "<p>This player has been banned " . sizeof($playerbans['response']) . " times.<p>";

echo "<h1>Ban reasons:</h1>";
foreach ($playerbans['response'] as $v) { //Foreach to loop through all bans supplied by the API and print their reasons.
    echo "<p>" . htmlspecialchars($v['reason']) . "</p>";
}

echo "<hr>";
var_dump($playerbans); //Dumping all of the information so you can see what is available.
