<?php
require_once("../src/tmpapilib.php"); //Include the library file.

use truckersmp\tmpapilib as truckersmp; //Tell PHP to use the library namespace.

$api = new truckersmp(); //Load the class into a variable, as defined by "use" above.

$time = $api->game_time(); //Use the class variable to access one of the class functions.

echo "<p>Year-Month-Day Hours:Minutes</p>";
echo "<p><b>Current Game time:</b> " . $time['years'] . "-" . $time['months'] . "-" . $time['days'] . " " . $time['hours'] . ":" . $time['minutes'] . "</p>";

echo "<hr>";
var_dump($time); //Dumping all of the information so you can see what is available.
