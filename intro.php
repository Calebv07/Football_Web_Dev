<?php

//DO NOT USE IN PRODUCTION ENVIRONMENT
$servername = "localhost";
$username = "root";
$password = "DynoMonitorFoodPan374$&%";
$dbname = "footballApp";

//Create a Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection
if(!$conn) {
    die("Connection Broken: " .mysqli_connect_error());
}
$sql = "INSERT INTO play (passer, reciever, rusher, returner, tacklerOne, tacklerTwo)
VALUES (20, 10, 23, 46, 12, 15)";

if (mysqli_query($conn, $sql)) {
    echo "New Record Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>