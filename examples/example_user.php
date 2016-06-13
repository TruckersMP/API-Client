<?php
require_once("../src/tmpapilib.php"); //Include the library file.

use truckersmp\tmpapilib as truckersmp; //Tell PHP to use the library namespace.

$api = new truckersmp(); //Load the class into a variable, as defined by "use" above.
$thisplayer = $api->player(1); //Use the class variable to access one of the class functions, loading the player with ID 1. Also works with SteamID64.

echo "Player 1 is " . $thisplayer['response']['name'] . '<br>'; //Write the information about Player 1 to the document.
echo "(S)He is a " . $thisplayer['response']['groupName'] . '<br>';

echo "<hr>";
var_dump($thisplayer); //Dumping all of the information so you can see what is available.
