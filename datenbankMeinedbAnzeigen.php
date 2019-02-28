<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Datenbank anzeigen</title>
    <link href="datenbank.css" rel="stylesheet" type="text/css">
    <script src="datenbank.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">



</head>
<body>
<h2>Tabellen anzeigen</h2>

<section>       
<?php   
        // Fehler anzeigen (nicht im Livebetrieb)
        error_reporting(E_ALL | E_STRICT);

        //Verbindungsdaten für die Datenbank
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,"meinedb");


        // Inhalt der tbl_personen anzeigen
        $anfr = "Select * from meinedb.tbl_personen";
        mysqli_query($conn,"set names utf8");

        // anfrage wird abgeschickt und in $res abgespeichert
        $res = mysqli_query($conn, $anfr);


        $dsAnzahl = mysqli_num_rows($res); //Anzahl der Datensätze (Zeilen)
        $feldanzahl = mysqli_num_fields($res); //Anzahl der Felder (Spalten) 5

        //Kontrollausgabe
        //echo "<div>".$dsAnzahl."</div>";
        //echo "<div>".$feldanzahl."</div>";



        //print_r($res);
        mysqli_close($conn);

        //=====================Datensätze aus tbl_personen bearbeiten================================
        //=====================Überschriften ermitteln=========================================================
        $ds = mysqli_fetch_assoc($res); // der 1. Datensatz wird herausgelesendurch(fetch_assoc)
        foreach($ds as $index => $wert){ // den key pro Feld auslesen
            echo "<div class ='headline'>".strtoupper($index)."</div>"; //key anzeigen(Überschriften)
        }
        //====================Inhalte aller Datensätze ermitteln und anzeigen===========================================================
        mysqli_data_seek($res,0); //Datensatzzeiger zurücksetzen wenn mehr als einmal ausgelesen wird
        for($i=0;$i<$dsAnzahl;$i++){
            $ds =mysqli_fetch_assoc($res);//extrahiert jeden Datensatz
                foreach($ds as $index =>$wert){//oder $ds as $wert bleibt hier gleich
                    echo "<div class ='inhalt'>".$wert."</div>";
                }

        }


?>
</section>

<p><button onclick="window.location.href='datenEinfügen.php'">Daten einlesen</button>
<button onclick="window.location.href='datenAendern.php'">Daten ändern</button>
<button onclick="window.location.href='datenLoeschen.php'">Daten löschen</button></p>
</body>

</html>