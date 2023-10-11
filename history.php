<?php
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "DynoMonitorFoodPan374$&%";
    $dbname = "footballApp";

    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    if(!$conn) {
        die("Connection Broken: " . mysqli_connect_error());
    }

    $sqlfieldD = "SELECT playID, playType, hash, backField, directPlay, oForm, oPlay, oStrength FROM fieldData";
    $sqlgameD = "SELECT playID, result, gainLoss, ODK, yardLine, down, distance FROM gameData";
    $sqlgameI = "SELECT playID, oppName, homeName, date FROM gameInfo";
    $sqlplay = "SELECT playID, passer, receiver, rusher, returner, tacklerOne, tacklerTwo FROM play";

    $resultFieldD = mysqli_query($conn, $sqlfieldD);
    $resultGameD = mysqli_query($conn, $sqlgameD);
    $resultGameI = mysqli_query($conn, $sqlgameI);
    $resultPlay = mysqli_query($conn, $sqlplay);

    if(mysqli_num_rows($resultFieldD)>0 && mysqli_num_rows($resultGameD)>0 && mysqli_num_rows($resultGameI)>0 && mysqli_num_rows($resultPlay)>0) {
        echo "<table>
                <tr>
                    <th>Play ID</th>
                    <th>Opponent Name</th>
                    <th>Home Name</th>
                    <th>Date</th>
                    <th>Play Type</th>
                    <th>Hash</th>
                    <th>Direction of Play</th>
                    <th>Back Field</th>
                    <th>Offensive Formation</th>
                    <th>Offensive Play</th>
                    <th>Offensive Strength</th>
                    <th>Result</th>
                    <th>Gain/Loss</th>
                    <th>ODK</th>
                    <th>Yard Line</th>
                    <th>Down</th>
                    <th>Distance</th>
                    <th>Passer</th>
                    <th>Receiver</th>
                    <th>Rusher</th>
                    <th>Returner</th>
                    <th>Tackler One</th>
                    <th>Tackler Two</th>
                <tr>";

        while(null !== ($table0 = mysqli_fetch_assoc($resultGameI)) && null !== ($table1 = mysqli_fetch_assoc($resultFieldD)) && null !== ($table2 = mysqli_fetch_assoc($resultGameD)) && null !== ($table3 = mysqli_fetch_assoc($resultPlay))) {
            echo "<form action=\"update.php\" method=\"POST\"><tr>
                    <input name=\"playID\" type=\"hidden\" value\"". $table0['playID'] . "\">
                    <td>". $table0['playID'] . "</td>
                    <td><input name=\"oppName\" type=\"text\" value=\"" . $table0['oppName'] . "\"></td>
                    <td><input name=\"homeName\" type=\"text\" value=\"" . $table0['homeName'] . "\"></td>
                    <td><input name=\"date\" type=\"date\" value=\"" . $table0['date'] . "\"></td>
                    <td><select name=\"playType\"><option value=\"R\"" . (($table1['playType'] == "R" ) ? 'selected="selected"':"") . ">Run</option><option value=\"P\" " . (($table1['playType'] == "P" ) ? 'selected="selected"':"") . ">Pass</option></select></td>
                    <td><select name=\"hash\"><option value=\"L\" " . (($table1['hash'] == "L" ) ? 'selected="selected"':"") . ">Left</option><option value=\"M\" " . (($table1['hash'] == "M" ) ? 'selected="selected"':"") . ">Middle</option><option value=\"R\" " . (($table1['hash'] == "R" ) ? 'selected="selected"':"") . ">Right</option></select></td>
                    <td><select name=\"directPlay\"><option value=\"L\" " . (($table1['directPlay'] == "L" ) ? 'selected="selected"':"") . ">Left</option><option value=\"M\" " . (($table1['directPlay'] == "M" ) ? 'selected="selected"':"") . ">Middle</option><option value=\"R\" " . (($table1['directPlay'] == "R" ) ? 'selected="selected"':"") . ">Right</option></select></td>
                    <td><input name=\"backField\" type=\"text\" value=\"" . $table1['backField'] . "\"></td>
                    <td><input name=\"oForm\" type=\"text\" value=\"" . $table1['oForm'] . "\"></td>
                    <td><input name=\"oPlay\" type=\"text\" value=\"" . $table1['oPlay'] . "\"></td>
                    <td><input name=\"oStrength\" type=\"number\" value=\"" . $table1['oStrength'] . "\"></td>
                    <td><input name=\"result\" type=\"text\" value=\"" . $table2['result'] . "\"></td>
                    <td><input name=\"gainLoss\" type=\"text\" value=\"" . $table2['gainLoss'] . "\"></td>
                    <td><select name=\"odk\" placeholder=\"ODK\"><option value=\"O\" " . (($table2['ODK'] == "O" ) ? 'selected="selected"':"") . ">Offensive</option><option value=\"D\" " . (($table2['ODK'] == "D" ) ? 'selected="selected"':"") . ">Defensive</option><option value=\"K\" " . (($table2['ODK'] == "K" ) ? 'selected="selected"':"") . ">Kicking</option></select></td>
                    <td><input name=\"yardLine\" type=\"number\" value=\"" . $table2['yardLine'] . "\"></td>
                    <td><select name=\"down\"><option value=\"1\" " . (($table2['down'] == "1" ) ? 'selected="selected"':"") . ">First</option><option value=\"2\" " . (($table2['down'] == "2" ) ? 'selected="selected"':"") . ">Second</option><option value=\"3\" " . (($table2['down'] == "3" ) ? 'selected="selected"':"") . ">Third</option><option value=\"4\" " . (($table2['down'] == "4" ) ? 'selected="selected"':"") . ">Fourth</option></select></td>
                    <td><input name=\"distance\" type=\"number\" value=\"" . $table2['distance'] . "\"></td>
                    <td><input name=\"returner\" type=\"number\" value=\"" . $table3['passer'] . "\"></td>
                    <td><input name=\"rusher\" type=\"number\" value=\"" . $table3['receiver'] . "\"></td>
                    <td><input name=\"passer\" type=\"number\" value=\"" . $table3['rusher'] . "\"></td>
                    <td><input name=\"receiver\" type=\"number\" value=\"" . $table3['returner'] . "\"></td>
                    <td><input name=\"tacklerOne\" type=\"number\" value=\"" . $table3['tacklerOne'] . "\"></td>
                    <td><input name=\"tacklerTwo\" type=\"number\" value=\"" . $table3['tacklerTwo'] . "\"></td>
                    <td><input type=submit></td>
                </tr></form>";
                usleep(500000);
        }
        echo "</table>";
    } else {
        die;
    }

    mysqli_close($conn);
    
    ?> 