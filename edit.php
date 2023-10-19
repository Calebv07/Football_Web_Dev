<?php
    $playID = $_POST["playIDEdit"];
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "DynoMonitorFoodPan374$&%";
    $dbname = "footballApp";

    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    if(!$conn) {
        die("Connection Broken: " . mysqli_connect_error());
    }

    $sqlfieldD = "SELECT playID, playType, hash, backField, directPlay, oForm, oPlay, oStrength FROM fieldData WHERE playID = '$playID'";
    $sqlgameD = "SELECT playID, result, gainLoss, ODK, yardLine, down, distance FROM gameData WHERE playID = '$playID'";
    $sqlgameI = "SELECT playID, oppName, homeName, date FROM gameInfo WHERE playID = '$playID'";
    $sqlplay = "SELECT playID, passer, receiver, rusher, returner, tacklerOne, tacklerTwo FROM play WHERE playID = '$playID'";

    $resultFieldD = mysqli_query($conn, $sqlfieldD);
    $resultGameD = mysqli_query($conn, $sqlgameD);
    $resultGameI = mysqli_query($conn, $sqlgameI);
    $resultPlay = mysqli_query($conn, $sqlplay);
    
    if(mysqli_num_rows($resultFieldD)>0 && mysqli_num_rows($resultGameD)>0 && mysqli_num_rows($resultGameI)>0 && mysqli_num_rows($resultPlay)>0) {
        $table0 = mysqli_fetch_assoc($resultGameI);
        $table1 = mysqli_fetch_assoc($resultFieldD);
        $table2 = mysqli_fetch_assoc($resultGameD);
        $table3 = mysqli_fetch_assoc($resultPlay);
        
        echo "<!DOCTYPE html>
        <html lang=\"en\">
            <head>
                <title>Football Application</title>
                <meta charset=\"utf-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <link rel=\"stylesheet\" href=\"site.css\">
                <style>
                    .fade {
                        animation: onLoadFadeEdit 1s forwards !important;
                    }
                    .cancelButton {
                        position: absolute;
                        top: 39%;
                        right: 15%;
                    }
                    .cancelButton {
                        height: 50px;
                        width: 200px;
                        box-shadow: 0 6px #8a3f38;
                        background-color: #E66B61;
                        border-radius: 5px; 
                        transition: 200ms;
                    }
                    a {
                        text-decoration: none;
                    }
                    .cancelButtonText {
                        top: 0%;
                        color: white;
                        font-family: \"Rockwell\";
                        font-size: 1.5em;
                        text-align: center;
                        text-decoration: none;
                        position: relative;
                        top: 10px;
                    }
                    .cancelButton:hover {
                        background-color: #e17c73;
                        box-shadow: 0 10px #8a3f38;
                        transform: translateY(-4px);
                        transition: 200ms;
                    }
                    .cancelButton:active {
                        background-color: #a34037;
                        box-shadow: 0 2px #8a3f38 !important;
                        transform: translateY(4px);
                        transition: 100ms;
                    }
                </style>
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
                <form action=\"update.php\" method=\"post\">
                    <input name=\"playIDEdit\" type=\"hidden\" value=\"". $table0['playID'] . "\">
                    <aside class=\"quickViewEdit\">
                        <h3>You are currently editing Play #<div class=\"quickViewEditplay\">". $table0['playID'] . "</div></h3>
                    </aside>
                    <header class=\"header\">
                        <input name=\"oppName\" type=\"text\" value=\"" . $table0['oppName'] . "\">
                        
                        <input name=\"homeName\" type=\"text\" value=\"" . $table0['homeName'] . "\">
                        
                       <input name=\"date\" type=\"date\" value=\"" . $table0['date'] . "\">
                       <div class=\"cancelButton\">
                            <a href=\"./history.php\"><div class=\"cancelButtonText\">CANCEL</div></a>
                        </div>
                        <div class=\"submitButton\">
                            <input type=\"submit\" class=\"submitButton\" value=\"        EDIT\"></input>
                        </div>
                    </header>
                    <main>
                        <section class=\"quickEdit container\">
                            <input name=\"result\" type=\"text\" value=\"" . $table2['result'] . "\">
                            <input name=\"gainLoss\" type=\"text\" value=\"" . $table2['gainLoss'] . "\">
                           <select name=\"odk\" placeholder=\"ODK\"><option value=\"O\" " . (($table2['ODK'] == "O" ) ? 'selected="selected"':"") . ">Offensive</option><option value=\"D\" " . (($table2['ODK'] == "D" ) ? 'selected="selected"':"") . ">Defensive</option><option value=\"K\" " . (($table2['ODK'] == "K" ) ? 'selected="selected"':"") . ">Kicking</option></select>
                            <input name=\"yardLine\" type=\"number\" value=\"" . $table2['yardLine'] . "\">
                            <select name=\"down\"><option value=\"1\" " . (($table2['down'] == "1" ) ? 'selected="selected"':"") . ">First</option><option value=\"2\" " . (($table2['down'] == "2" ) ? 'selected="selected"':"") . ">Second</option><option value=\"3\" " . (($table2['down'] == "3" ) ? 'selected="selected"':"") . ">Third</option><option value=\"4\" " . (($table2['down'] == "4" ) ? 'selected="selected"':"") . ">Fourth</option></select>
                            <input name=\"distance\" type=\"number\" value=\"" . $table2['distance'] . "\">
                        </section>
                        <section class=\"fieldAndPlayer\">
                            <div class=\"field container\">
                                <img alt=\"Football Field\" src=\"assets/images/footballField.svg\"/>
                            </div>
                            <div class=\"player container\">
                                <div class=\"playerSection\">
                                  <div>
                                    <h2>Returner</h2>
                                    <input name=\"returner\" type=\"number\" value=\"" . $table3['passer'] . "\">
                                  </div>
                                  <div>
                                    <h2>Rusher</h2>
                                    <input name=\"rusher\" type=\"number\" value=\"" . $table3['receiver'] . "\">
                                  </div>
                                </div>
                                <div class=\"playerSection\">
                                  <div>
                                    <h2>Passer</h2>
                                    <input name=\"passer\" type=\"number\" value=\"" . $table3['rusher'] . "\">
                                  </div>
                                  <div>
                                    <h2>Receiver</h2>
                                    <input name=\"receiver\" type=\"number\" value=\"" . $table3['returner'] . "\">
                                  </div>
                                </div>
                                <div class=\"playerSection\">
                                    <div>
                                        <h2>Tackler 1</h2>
                                        <input name=\"tacklerOne\" type=\"number\" value=\"" . $table3['tacklerOne'] . "\">
                                      </div>
                                      <div>
                                        <h2>Tackler 2</h2>
                                        <input name=\"tacklerTwo\" type=\"number\" value=\"" . $table3['tacklerTwo'] . "\">
                                      </div>
                                </div>
                              </div>
                        </section>
                        <section class=\"fieldDataSelection container\">
                            <div class=\"row\">
                                <div class=\"fieldOptions\">
                                    <h4>Playtype</h4>
                                    <select name=\"playType\"><option value=\"R\"" . (($table1['playType'] == "R" ) ? 'selected="selected"':"") . ">Run</option><option value=\"P\" " . (($table1['playType'] == "P" ) ? 'selected="selected"':"") . ">Pass</option></select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Hash</h4>
                                    <select name=\"hash\"><option value=\"L\" " . (($table1['hash'] == "L" ) ? 'selected="selected"':"") . ">Left</option><option value=\"M\" " . (($table1['hash'] == "M" ) ? 'selected="selected"':"") . ">Middle</option><option value=\"R\" " . (($table1['hash'] == "R" ) ? 'selected="selected"':"") . ">Right</option></select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Direction of Play</h4>
                                    <select name=\"directPlay\"><option value=\"L\" " . (($table1['directPlay'] == "L" ) ? 'selected="selected"':"") . ">Left</option><option value=\"M\" " . (($table1['directPlay'] == "M" ) ? 'selected="selected"':"") . ">Middle</option><option value=\"R\" " . (($table1['directPlay'] == "R" ) ? 'selected="selected"':"") . ">Right</option></select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Backfield</h4>
                                    <input name=\"backField\" type=\"text\" value=\"" . $table1['backField'] . "\">
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Formation</h4>
                                    <input name=\"oForm\" type=\"text\" value=\"" . $table1['oForm'] . "\">
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Play</h4>
                                    <input name=\"oPlay\" type=\"text\" value=\"" . $table1['oPlay'] . "\">
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Strength</h4><input name=\"oStrength\" type=\"number\" value=\"" . $table1['oStrength'] . "\">
                                </div>
                                </select>
                            </div>
                        </section>
                    </main>
                </form>
            </body>
        </html>";
    } else {
        die;
    }

    mysqli_close($conn);

?>