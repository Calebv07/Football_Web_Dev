<?php
$playID = $_POST["playID"];
$kicker = $_POST["kicker"];
$passer = $_POST["passer"];
$reciever = $_POST["reciever"];
$returner = $_POST["returner"];
$tackerTwo = $_POST["tacklerTwo"];
$tacklerOne = $_POST["tacklerOne"];

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "footballApp";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if($conn) {
    echo "Connection Success!";
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}

$sql = "INSERT INTO play (playID, kicker, passer, receiver, tacklerOne, tacklerTwo)
VALUES ('$playID', '$kicker', '$passer', '$reciever', '$tacklerOne', '$tacklerTwo')";

if (mysqli_query($conn, $sql)) {
    echo "<br> New Record Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

//header("Location: index.html")
?>