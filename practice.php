<?php
/* 4 Stages
        1. Initlization Stage - We setup and declare variables for connection
        2. Create the Connection - We create the connection variable between us and the database with those variables
        3. Test the Connection - We test the connection with the variable created before
        4. Create a Record - We create a record within the database
*/
/* Stage 1 - Initialization Stage */
$servername = "localhost"; // <-- This is the ip address of the server (In this case on this computer)
$username = "root"; // <-- This is the username of the user/client trying to access the DB
$password = "DynoMonitorFoodPan374"; // <-- This is the password of the user/client
$dbname = "footballApp"; // <-- This is the name of the database we're trying to connect to
// All these variables and their is CASE SENSITIVE

/* Stage 2 - Create the Connection */
$conn = mysqli_connect($servername, $username, $password, $dbname); // <-- Make sure all statements end with ;
// I want to create a variable, called conn (short for connection) that uses the mysqli function to connect to the
// database with prev variables.

/* Stage 3 - Test the Connection */
if($conn) {
    echo "Connection Success!";
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}



/* ----- DO NOT COPY
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
*/

?>