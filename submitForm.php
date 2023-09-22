<?php 

// Connection Variables to connect to the database
$dbserver = 'localhost';
$dbuser = 'root';
$dbpass = 'DynoMonitorFoodPan374$&%';
$dbname = 'footballApp';

// Connection object, statement that connects to the database
$conn = mysql_connection($dbserver, $dbuser, $dbpass, $dbname); 

// Checking connection, if unable to then kill process.
if(!$conn) {
  die("Error connecting to database: \n" . mysqli_connect_error());
}



?>