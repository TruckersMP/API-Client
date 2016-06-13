<?php
require_once("../src/tmpapilib.php"); //Include the library file.

use truckersmp\tmpapilib as truckersmp; //Tell PHP to use the library namespace.

$api = new truckersmp(); //Load the class into a variable, as defined by "use" above.
$servers = $api->servers(); //Use the class variable to access one of the class functions.

echo "<h1>Servers:</h1>";
foreach ($servers['response'] as $v)
{ //Foreach to loop through all servers supplied by the API and print their statuses.
    if ($v['online'] == TRUE) {
        $online = "Online";
    } else {
        $online = "Offline";
    }
    echo "<p>" . $v['game'] . " " . $v['name'] . ":" . $online . "(" . $v['players'] . "/" . $v['maxplayers'] . ")" ."</p>";
}

echo "<hr>";
var_dump($servers); //Dumping all of the information so you can see what is available.
