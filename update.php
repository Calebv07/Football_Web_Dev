<?php
$playID = $_POST["playID"];
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
$playNum = $_POST["playNum"];

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "footballApp";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
if(!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}


$queryPlay = "UPDATE play SET gameID = '1', passer = '$passer', receiver = $receiver, rusher = $rusher, returner = $returner, tacklerOne = $tacklerOne, tacklerTwo = $tacklerTwo
WHERE playID = '$playID'";

$queryFieldData = "UPDATE fieldData SET gameID = '1', playType = '$playType', hash = '$hash', directPlay = $directPlay', backField, oForm, oPlay, oStrength)
VALUES ('1', '$playType', '$hash', '$directPlay', '$backField', '$oForm', '$oPlay', '$oStrength') WHERE playID = '$playID'";

$queryGameData = "UPDATE gameData SET (gameID, result, gainLoss, ODK, yardLine, down, distance)
VALUES ('1', '$result', '$gainLoss', '$odk', '$yardLine', '$down', '$distance') WHERE playID = '$playID'";

$queryGameInfo = "UPDATE gameInfo SET (gameID, oppName, homeName, date)
VALUES ('1', '$oppName','$homeName','$date') WHERE playID = '$playID'";

if (mysqli_query($conn, $queryPlay) && mysqli_query($conn, $queryFieldData) && mysqli_query($conn, $queryGameData) && mysqli_query($conn, $queryGameInfo)) {
    echo "<br> New Record Created";
} else {
    echo "Error:<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: history.php");
?>