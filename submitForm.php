<?php 

// Header Variables
$oppName = $_POST["oppName"];
$homeName = $_POST["homeName"];
$date = $_POST["date"];

// Quick Edit Bar
$result = $_POST["result"];
$gainLoss = $_POST["gainLoss"];
$okd = $_POST["ODK"];
$yardLine = $_POST["yardLine"];
$down = $_POST["down"];
$distance = $_POST["distance"];

// Player Section
$return = $_POST["returner"];
$rusher = $_POST["rusher"];
$passer =  = $_POST["passer"];
$reciever = $_POST ["reciever"];
$tacklerOne = $_POST ["tacklerOne"];
$tacklerTwo = $_POST ["tacklerTwo"];

// Field Data Section
$playType = $_POST["playType"];
$hash = $_POST["hash"];
$directPlay = $_POST["directPlay"];
$backField = $_POST["backField"];
$oForm = $_POST["oForm"];
$oPlay = $_POST["oPLay"];
$oStrength = $_POST["oStrength"];

// Quick View Bar
$playNum = $_POST["playNum"];



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

$queryPlay = "INSERT INTO play (passer, reciever, rusher, returner, tacklerOne, tacklerTwo)
VALUES ('$passer', '$reciever', '$rusher', '$returner', '$tackler1', '$tackler2')";

$queryFieldData = "INSERT INTO fieldData (playType, hash, directPlay, backField, oForm, oPlay, oStrength)
VALUES ('$playType', '$hash', '$directPlay', '$backField', '$oForm', '$oPlay', '$oStrength')";

$queryGameData = "INSERT INTO gameData (result, gainLoss, ODK, yardLine, down, distance)
VALUES ('$result' , '$gainLoss', '$okd', '$yardLine', '$down' '$distance')";

$queryGameInfo = "INSERT INTO gameInfo (oppName, homeName, date)
VALUES ('$oppName','$homeName','$date')";

if (mysqli_query($conn, $queryPlay)) {
    echo "<br> New Record Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli.close($conn);

?>