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

    $resultFieldD = mysqli_query($conn, $sqlfieldD);
    $resultGameD = mysqli_query($conn, $sqlgameD);
    $resultGameI = mysqli_query($conn, $sqlgameI);

    echo "<!DOCTYPE html>
        <html lang=\"en\">
            <head>
                <title>Play History</title>
                <meta charset=\"utf-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <link rel=stylesheet href=history.css>
            </head>
            <body>
                <span class=\"fade\"></span>
                <div class=\"background\">
                    <span class=\"filter\"></span>
                    <span class=\"dot1\"></span>
                    <span class=\"dot2\"></span>
                    <span class=\"dot3\"></span>
                    <span class=\"dot4\"></span>
                </div>
                <header>
                    <div class=\"title\">
                        <h1>Play History</h1>
                        <h3>List of previously recorded plays</h3>
                    </div>
                    <div>
                        <button class=\"currentPlay\" type=\"submit\" formaction=\"index.html\" ><img src=\"/assets/navIcon/recordIcon.svg\" alt=\"Record Icon\" height=\"40px\"><span class=\"currentPlayText\">CURRENT PLAY</span></button>
                    </div>
                </header>
                <main>
                    <table class=\"container tableHeader\">
                        <tr class=\"col\"> 
                            <th>Play ID</th>
                            <th>Opponent</th>
                            <th>Result</th>
                            <th>Gain/Loss</th>
                            <th>ODK</th>
                            <th>Yard Line</th>
                            <th>Down</th>
                            <th>Distance</th>
                            <th>Action</th>
                        </tr>
                    </table>
                    <table class=\"container animateTable\">";
    if(mysqli_num_rows($resultFieldD)>0 && mysqli_num_rows($resultGameD)>0 && mysqli_num_rows($resultGameI)>0) {
        while(null !== ($table0 = mysqli_fetch_assoc($resultGameI)) && null !== ($table1 = mysqli_fetch_assoc($resultFieldD)) && null !== ($table2 = mysqli_fetch_assoc($resultGameD))) {
            echo "
                <tr class=\"col\">
                    <td>". $table0['playID'] . "</td>
                    <td>" . $table0['oppName'] . "</td>
                    <td>" . $table2['result'] . "</td>
                    <td>" . $table2['gainLoss'] . "</td>
                    <td>" . $table2['ODK'] . "</td>
                    <td>" . $table2['yardLine'] . "</td>
                    <td>" . $table2['down'] . "</td>
                    <td>" . $table2['distance'] . "</td>
                    <td class=\"actionButtons\"><form action=\"edit.php\" method=\"post\"><div class=\"editButton\"><input name=\"playIDEdit\" type=\"hidden\" value=\"". $table0['playID'] . "\"><input type=\"submit\" class=\"editButton\" value=\"\"></div></form><form action=\"delete_play.php\" method=\"post\"><div class=\"deleteButton\"><input name=\"playIDDelete\" type=\"hidden\" value=\"". $table0['playID'] . "\"><input type=\"submit\" class=\"deleteButton\" value=\"\"></div></form></td>
                </tr>
                <tr><td><hr></td></tr>
                ";
        }
        echo "            </table>
                    </main>
                    
                </body>
            </html>";
    } else {
        echo "          <tr class=\"col\"> 
                            <td>" . ((mysqli_error($conn) == '' ) ? "Nothing to show here. Try submitting a Play Record.":"mysqli_error($conn)") . "</td
                        </tr>  
                        </table>
                    </main>
                    
                </body>
            </html>";
    }

    mysqli_close($conn);
    
    ?> 