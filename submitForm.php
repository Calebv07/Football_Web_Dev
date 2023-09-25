<?php 

// Header Variables
$oppName = $_POST["oppName"];
$homeName = $_POST["homeName"];
$date = $_POST["date"];

// Quick Edit Bar
$result = $_POST["result"];
$gainLoss = $_POST["gainLoss"];
$odk = $_POST["odk"];
$yardLine = $_POST["yardLine"];
$down = $_POST["down"];
$distance = $_POST["distance"];

// Player Section
$returner = $_POST["returner"];
$rusher = $_POST["rusher"];
$passer = $_POST["passer"];
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
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname); 

// Checking connection, if unable to then kill process.
if(!$conn) {
  die("Error connecting to database: \n" . mysqli_connect_error());
}

$queryPlay = "INSERT INTO play (gameID, passer, reciever, rusher, returner, tacklerOne, tacklerTwo)
VALUES ('1', '$passer', '$reciever', '$rusher', '$returner', '$tacklerOne', '$tacklerTwo')";

$queryFieldData = "INSERT INTO fieldData (gameID, playType, hash, directPlay, backField, oForm, oPlay, oStrength)
VALUES ('1', '$playType', '$hash', '$directPlay', '$backField', '$oForm', '$oPlay', '$oStrength')";

$queryGameData = "INSERT INTO gameData (gameID, result, gainLoss, ODK, yardLine, down, distance)
VALUES ('1', '$result', '$gainLoss', '$odk', '$yardLine', '$down', '$distance')";

$queryGameInfo = "INSERT INTO gameInfo (gameID, oppName, homeName, date)
VALUES ('1', '$oppName','$homeName','$date')";

if (mysqli_multi_query($conn, $queryPlay, $queryFieldData, $queryGameData, $queryGameInfo)) {
    echo "<br> New Record Created";
} else {
    echo "Error: " . $queryGameInfo . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>