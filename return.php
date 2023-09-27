<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "practiceForm";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

if(!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}


$sqlfieldD = "SELECT * FROM fieldData";
$sqlfieldD = "SELECT gameID, playID, playType, hash, backField, backField, oForm, oPlay, oStrength FROM fieldData";

$sqlgameD = "SELECT * FROM gameData";
$sqlgameD = "SELECT * gameID, playID, result, gainLoss, ODK, yardLine, down, distance FROM gameData";

$sqlgameI = "SELECT * FROM gameInfo";
$sqlgameI = "SELECT * FROM gameID, playID, oppName, homeName, data";

$sqlplay = "SELECT * FROM play";
$sqlplay = "SELECT * FROM gameID, playID, passer, receiver, rusher, returner, tacklerOne, tacklerTwo";

$sqlplayerI = "SELECT * FROM playerinfo";
$sqlplayerI = "SELECT * FROM playID, playNumber, firstName, lastName";
?>