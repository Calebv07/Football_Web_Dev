<?php
    $playID = $_POST['playIDEdit'];
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
        echo "<!DOCTYPE html>
        <html lang=\"en\">
            <head>
                <title>Football Application</title>
                <meta charset=\"utf-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <link rel=\"stylesheet\" href=\"site.css\">
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
                <form action=\"upload.php\" method=\"post\">
                    <aside class=\"quickView\">
                        <div>
                            <input name=\"playNum\" type=\"text\" placeholder=\"Play Number\">
                        </div>
                    </aside>
                    <header class=\"header\">
                        <input name=\"oppName\" type=\"text\" value=\"" . $table0['oppName'] . "\">
                        <input name=\"homeName\" type=\"text\" value=\"" . $table0['homeName'] . "\">
                        <input name=\"date\" type=\"date\" class=\"dateInput\"></input>
                        <div class=\"submitButton\">
                            <input type=\"submit\" class=\"submitButton\" value=\"        SUBMIT\"></input>
                        </div>
                    </header>
                    <main>
                        <section class=\"quickEdit container\">
                            <input name=\"result\" type=\"text\" placeholder=\"Result\" >
                            <input name=\"gainLoss\" type=\"text\" placeholder=\"Gain / Loss\" >
                            <select name=\"odk\" placeholder=\"ODK\" >
                                <option value=\"O\">Offensive</option>
                                <option value=\"D\">Defensive</option>
                                <option value=\"K\">Kicking</option>
                            </select>
                            <input name=\"yardLine\" type=\"number\" placeholder=\"Yard Line\" >
                            <select name=\"down\" placeholder=\"Down\" >
                                <option value=\"1\">First</option>
                                <option value=\"2\">Second</option>
                                <option value=\"3\">Third</option>
                                <option value=\"4\">Fourth</option>
                            </select>
                            <input name=\"distance\" type=\"number\" placeholder=\"Distance\" >
                        </section>
                        <section class=\"fieldAndPlayer\">
                            <div class=\"field container\">
                                <img alt=\"Football Field\" src=\"assets/images/footballField.svg\"/>
                            </div>
                            <div class=\"player container\">
                                <div class=\"playerSection\">
                                  <div>
                                    <h2>Returner</h2>
                                    <input name=\"returner\" type=\"number\" placeholder=\"00\">
                                  </div>
                                  <div>
                                    <h2>Rusher</h2>
                                    <input name=\"rusher\" type=\"number\" placeholder=\"00\">
                                  </div>
                                </div>
                                <div class=\"playerSection\">
                                  <div>
                                    <h2>Passer</h2>
                                    <input name=\"passer\" type=\"number\" placeholder=\"00\">
                                  </div>
                                  <div>
                                    <h2>Receiver</h2>
                                    <input name=\"receiver\" type=\"number\" placeholder=\"00\">
                                  </div>
                                </div>
                                <div class=\"playerSection\">
                                    <div>
                                        <h2>Tackler 1</h2>
                                        <input name=\"tacklerOne\" type=\"number\" placeholder=\"00\">
                                      </div>
                                      <div>
                                        <h2>Tackler 2</h2>
                                        <input name=\"tacklerTwo\" type=\"number\" placeholder=\"00\">
                                      </div>
                                </div>
                              </div>
                        </section>
                        <section class=\"fieldDataSelection container\">
                            <div class=\"row\">
                                <div class=\"fieldOptions\">
                                    <h4>Playtype</h4>
                                    <select name=\"playType\" placeholder=\"Playtype\">
                                    <option value=\"R\">Run</option>
                                    <option value=\"P\">Pass</option>
                                    </select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Hash</h4>
                                    <select name=\"hash\" placeholder=\"Hash\">
                                    <option value=\"L\">Left</option>
                                    <option value=\"M\">Middle</option>
                                    <option value=\"R\">Right</option>
                                    </select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Direction of Play</h4>
                                    <select name=\"directPlay\" placeholder=\"Direction of Play\">
                                    <option value=\"L\">Left</option>
                                    <option value=\"M\">Middle</option>
                                    <option value=\"R\">Right</option>
                                    </select>
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Backfield</h4>
                                    <input name=\"backField\" type=\"text\" placeholder=\"Backfield\">
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Formation</h4>
                                    <input name=\"oForm\" type=\"text\" placeholder=\"Offensive Formation\">
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Play</h4>
                                    <input name=\"oPlay\" type=\"text\" placeholder=\"Offensive Play\">
                                </div>
                                <div class=\"fieldOptions\">
                                    <h4>Offensive Strength</h4>
                                    <input name=\"oStrength\" type=\"number\" placeholder=\"Offensive Strength\">
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