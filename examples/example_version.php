<?php
require_once("../src/tmpapilib.php"); //Include the library file.

use truckersmp\tmpapilib as truckersmp; //Tell PHP to use the library namespace.

$api = new truckersmp(); //Load the class into a variable, as defined by "use" above.
$version = $api->version(); //Use the class variable to access one of the class functions.

echo "<p><b>TruckersMP Version:</b> " . $version['name'] . "</p>";

echo "<hr>";
var_dump($version); //Dumping all of the information so you can see what is available.
