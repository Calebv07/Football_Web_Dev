<?php 

$oppName = $_POST["oppName"];
$homeName = $_POST["homeName"];
$date = $_POST["date"];
$result = $_POST["result"];
$gainLoss = $_POST["gainLoss"];
$odk = $_POST["odk"];
$yardLine = $_POST["yardLine"];
$down = $_POST["down"];
$distance = $_POST["distance"];
$returner = $_POST["returner"];
$rusher = $_POST["rusher"];
$passer = $_POST["passer"];
$receiver = $_POST ["receiver"];
$tacklerOne = $_POST ["tacklerOne"];
$tacklerTwo = $_POST ["tacklerTwo"];
$playType = $_POST["playType"];
$hash = $_POST["hash"];
$directPlay = $_POST["directPlay"];
$backField = $_POST["backField"];
$oForm = $_POST["oForm"];
$oPlay = $_POST["oPLay"];
$oStrength = $_POST["oStrength"];


$dbserver = 'localhost';
$dbuser = 'root';
$dbpass = 'DynoMonitorFoodPan374$&%';
$dbname = 'footballApp';
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname); 
if(!$conn) {
  die("Error connecting to database: \n" . mysqli_connect_error());
}


$queryPlay = "INSERT INTO play (gameID, passer, receiver, rusher, returner, tacklerOne, tacklerTwo)
VALUES ('1', '$passer', '$receiver', '$rusher', '$returner', '$tacklerOne', '$tacklerTwo')";

$queryFieldData = "INSERT INTO fieldData (gameID, playType, hash, directPlay, backField, oForm, oPlay, oStrength)
VALUES ('1', '$playType', '$hash', '$directPlay', '$backField', '$oForm', '$oPlay', '$oStrength')";

$queryGameData = "INSERT INTO gameData (gameID, result, gainLoss, ODK, yardLine, down, distance)
VALUES ('1', '$result', '$gainLoss', '$odk', '$yardLine', '$down', '$distance')";

$queryGameInfo = "INSERT INTO gameInfo (gameID, oppName, homeName, date)
VALUES ('1', '$oppName','$homeName','$date')";

if (mysqli_query($conn, $queryPlay) && mysqli_query($conn, $queryFieldData) && mysqli_query($conn, $queryGameData) && mysqli_query($conn, $queryGameInfo)) {
    echo "<br> New Record Created";
} else {
    echo "Error:<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: index.html");

?>