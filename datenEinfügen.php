<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Datenbank</title>
    <link href="datenbank.css" rel="stylesheet" type="text/css">
    <script src="datenbank.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">



</head>
<body style="background-color: lightblue">


<h2>Datenbank meinedb Daten einfügen</h2>

<?php
    // nur wenn gesendet gedrückt Verbinung öffnen und Daten übertragen
    if (isset($_POST ["gesendet"])) {
        // Fehler anzeigen (nicht im Livebetrieb)
        error_reporting(E_ALL | E_STRICT);

        //Verbindungsdaten für die Datenbank
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "meinedb");

        //alle Werte aus formular aufgenommen
        $nachname = mysqli_real_escape_string($conn, $_POST["nachname"]);
        $vorname = mysqli_real_escape_string($conn, $_POST["vorname"]);
        $gehalt = mysqli_real_escape_string($conn, $_POST["gehalt"]);
        $geburtsdatum = mysqli_real_escape_string($conn, $_POST["geburtsdatum"]);

        $eingabe ="insert into tbl_personen
                    values
                    (NULL,'".$nachname."','".$vorname."','".$gehalt."','".$geburtsdatum."')";

                    mysqli_query($conn,"SET NAMES UTF-8");
                    mysqli_query($conn,$eingabe) or die(mysqli_error($conn));
                    mysqli_close($conn);

    }    

     ?>
     <!--div id="formular"-->
         <h2>Daten einlesen</h2>
         <form action="datenEinfügen.php" method="POST" name="mitarbeiter">
    <div id="wrapper">
        <fieldset>
            <legend>Personaldaten</legend>
                <p class="pTag"><label>Nachname</label><input type="text" class="ab" name="nachname"></p>
                <p class="pTag"><label>Vorname</label><input type="text"class="ab" name="vorname"></p>
                <p class="pTag"><label>Gehalt</label><input type="number" step="0.01" class="ab" name="gehalt"></p>
                <p class="pTag"><label>Geburtsdatum</label><input type="date" class="ab" name="geburtsdatum"></p>

                <p><input type="submit" name="gesendet" value="Daten abschicken"></p>
                
            </fieldset>

            </form>
        </div>
            <p><button onclick="window.location.href='datenbankMeinedbAnzeigen.php'">Daten anzeigen</button>

     <!--/div-->
</body>

</html>