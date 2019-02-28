<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Datenbank</title>
    <link href="datenbank.css" rel="stylesheet" type="text/css">
    <!--script src="datenbank.js"></script-->
    <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">



</head>
<body style="background-color: orange">


<h2>Datenbank meinedb und Tabellen erstellen</h2>

<?php
        

        error_reporting(E_ALL | E_STRICT);

        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database
        $anfrDatabase = "DROP DATABASE if EXISTS meinedb;";
        mysqli_query($conn, $anfrDatabase);

        $sql = "CREATE DATABASE meinedb";
        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully<hr>";
        } else {
            echo "Error creating database: " . mysqli_error($conn)."<hr>";
        }
        //$anfr = "drop table if exists tbl_test";
        $anfrtabelle = "DROP table if EXISTS tbl_personen;";
        mysqli_query($conn, $anfrtabelle);

        // Tabelle erstellen
        mysqli_query($conn,"Use meinedb");
        $sql = "CREATE table tbl_personen(
                personalnummer int(11) auto_increment Primary key,
                nachname varchar(30) not null,
                vorname varchar(30) not null,
                gehalt decimal(6,2) not null,
                geburtstag date not null
                );";
                if (mysqli_query($conn, $sql)) {
                    echo "Table created successfully<hr>";
                } else {
                    echo "Error creating table: " . mysqli_error($conn)."<hr>";
                }
        $eingabe ="insert into tbl_personen
                    values
                    (NULL,'Maack','Marcel',5000.00,'1976-01-20'),
                    (NULL,'Maack','Marcel',5000.00,'1976-01-20');";
                    if (mysqli_query($conn, $eingabe)) {
                        echo "Eingabe successfully<hr>";
                    } else {
                        echo "Error creating Eingabe: " . mysqli_error($conn)."<hr>";
                    }
        //mysqli_query($conn, $sql);
        mysqli_close($conn);
 ?>  
  <p><button onclick="window.location.href='datenbankMeinedbAnzeigen.php'">Daten anzeigen</button></p>
</body>

</html>