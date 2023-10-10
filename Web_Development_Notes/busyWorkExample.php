<?php 
$favoriteColor = $_POST["favColor"];
$favNum = $_POST["favNum"];
$currentDate = $_POST["currentDate"];
$gender = $_POST["gender"];

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "PASSWORD";
$dbname = "practiceForm";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if($conn) {
    echo "Connection Success!";
} elseif (!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}

$sql = "INSERT INTO identity (firstName, lastName, email, gender)
VALUES ('$favColor', '$favNum', '$currentDate', '$gender')";

if (mysqli_query($conn, $sql)) {
    echo "<br> New Record Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>