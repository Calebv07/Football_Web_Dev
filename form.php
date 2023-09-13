<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];

$dbserver = "locahost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "practiceForm";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if($conn) {
    echo "Connection Success!";
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}

$sql = "INSERT INTO play (firstName, lastName, email)
VALUES ($firstName, $lastName, $email)";

if (mysqli_query($conn, $sql)) {
    echo "New Record Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>