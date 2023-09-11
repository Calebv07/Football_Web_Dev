<?php

//DO NOT USE IN PRODUCTION ENVIRONMENT
$servername = "localhost";
$username = "root";
$password = "DynoMonitorFoodPan374$&%";
$dbname = "	footballApp";

//Create a Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection
if(!$conn) {
    die("Connection Broken: " .mysqli_connect_error());
}


?>