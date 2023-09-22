<?php 

$dbserver = 'localhost';
$dbuser = 'root';
$dbpass = 'DynoMonitorFoodPan374$&%';
$dbname = 'footballApp';

$conn = mysql_connection($dbserver, $dbuser, $dbpass, $dbname); 

if(!$conn) {
  die("Error connecting to database: \n" . mysqli_connect_error());
}



?>