<?php
# Work for September 26, 2023
TODO:
//- [ ] Setup basic connection to database
//- [ ] Select data for all tables
//- [ ] Return all the data in a table format
//- [ ] Stylize the return table (Task for Caleb)

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "DynoMonitorFoodPan374$&%";
$dbname = "footballApp";

$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);


if(!$conn) {
    die("Connection Broken: " . mysqli_connect_error());
}


$sqlfieldD = "SELECT * FROM fieldData";
$sqlfieldD = "SELECT gameID, playID, playType, hash, backField, directPlay, oForm, oPlay, oStrength FROM fieldData";

$sqlgameD = "SELECT * FROM gameData";
$sqlgameD = "SELECT * gameID, playID, result, gainLoss, ODK, yardLine, down, distance FROM gameData";

$sqlgameI = "SELECT * FROM gameInfo";
$sqlgameI = "SELECT * FROM gameID, playID, oppName, homeName, data";

$sqlplay = "SELECT * FROM play";
$sqlplay = "SELECT * FROM gameID, playID, passer, receiver, rusher, returner, tacklerOne, tacklerTwo";

$sqlplayerI = "SELECT * FROM playerinfo";
$sqlplayerI = "SELECT * FROM playID, playNumber, firstName, lastName";

$result = mysqli_query($conn, $sqlfieldD);
$result2 = mysqli_query($conn, $sqlgameD);

if(mysqli_num_rows($result)>0) {
    echo "<table>
            <tr>
                <th>gameID</th>
                <th>playID</th>
                <th>playType</th>
                <th>hash</th>
                <th>directPlay</th>
                <th>backField</th>
                <th>oForm</th>
                <th>oPlay</th>
                <th>oStrength</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['gameID'] . "</td>
                <td>" . $row['playID'] . "</td>
                <td>" . $row['playType'] . "</td>
                <td>" . $row['hash'] . "</td>
                <td>" . $row['directPlay'] . "</td>
                <td>" . $row['backField'] . "</td>
                <td>" . $row['oForm'] . "</td>
                <td>" . $row['oPlay'] . "</td>
                <td>" . $row['oStrength'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    die;
}


if(mysqli_num_rows($result2)>0) {
    echo "<table>
            <tr>
                <th>gameID</th>
                <th>playID</th>
                <th>result</th>
                <th>gainLoss</th>
                <th>ODK</th>
                <th>yardLine</th>
                <th>down</th>
                <th>distance</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['gameID'] . "</td>
                <td>" . $row['playID'] . "</td>
                <td>" . $row['result'] . "</td>
                <td>" . $row['gainLoss'] . "</td>
                <td>" . $row['ODK'] . "</td>
                <td>" . $row['yardLine'] . "</td>
                <td>" . $row['down'] . "</td>
                <td>" . $row['distance'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    die;
}


if(mysqli_num_rows($request)>0) {
    echo "<table>
            <tr>
                <th>gameID</th>
                <th>playID</th>
                <th>oppName</th>
                <th>homeName</th>
                <th>date</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['gameID'] . "</td>
                <td>" . $row['playID'] . "</td>
                <td>" . $row['oppName'] . "</td>
                <td>" . $row['homeName'] . "</td>
                <td>" . $row['date'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    die;
}


if(mysqli_num_rows($request)>0) {
    echo "<table>
            <tr>
                <th>gameID</th>
                <th>playID</th>
                <th>passer</th>
                <th>receiver</th>
                <th>rusher</th>
                <th>returner</th>
                <th>tacklerOne</th>
                <th>tacklerTwo</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['gameID'] . "</td>
                <td>" . $row['playID'] . "</td>
                <td>" . $row['passer'] . "</td>
                <td>" . $row['receiver'] . "</td>
                <td>" . $row['rusher'] . "</td>
                <td>" . $row['returner'] . "</td>
                <td>" . $row['tacklerOne'] . "</td>
                <td>" . $row['tacklerTwo'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    die;
}


if(mysqli_num_rows($request)>0) {
    echo "<table>
            <tr>
                <th>play</th>
                <th>playNumber</th>
                <th>firstName</th>
                <th>lastName</th>
            <tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['play'] . "</td>
                <td>" . $row['playNumber'] . "</td>
                <td>" . $row['firstName'] . "</td>
                <td>" . $row['lastName'] . "</td>

              </tr>";
    }
    echo "</table>";
} else {
    die;
}


mysqli_close();
  
?>