<?php
/* 4 Stages
        1. Initialization Stage - We set and declare variables for connection
        2. Create the Connection - We create the connection variable between us and the database with those variables
        3. Test the Connection - We test the connection with the variable created before
        4. Create a Record - We create a record within the database
        5. Query the request - We send the data to the database
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
// IF the connection is successful, output "Connection Successful"
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}
// IF the connection is NOT (declared with !) successful, output "Connection Broken" and also the error that occurred

/* Stage 4 - Create the record */
$sql = "INSERT INTO play (passer, reciever, rusher, returner, tacklerOne, tacklerTwo)
VALUES (20, 10, 23, 46, 12, 15)";
// This is all one line of code, it is just separated by "Enter" key
/*
  Creating a new variable called SQL (This will be a string, so use quotes), we want to add a new record using
  INSERT. We're going to INSERT INTO the table that we want, in this case, "play". In parathesis, we define WHAT
  fields we're changing, e.g. passer, receiver, returner, tacklerOne, tacklerTwo. We DO NOT have to update
  auto-incrementing fields, they will automatically increment themselves. Then we define what VALUES we want
  to be in those FIELDS. Using the value key, we define our values in parathesis again. This time with our
  actual values. E.g. "20, 10, 23, 46, 12, 15"
*/

/* Stage 5 - Query the request */
if (mysqli_query($conn, $sql)) {
    echo "New Record Created"; // <-- IF we mysqli query our request with our connection variables successfully, output "New Record Created"
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); // <-- IF anything else other than a successful query happens, output "Error: " and the error that occurred
}

// ALWAYS CLOSE THE CONNECTION AFTER ALL TRANSACTIONS
mysqli_close($conn);

?>