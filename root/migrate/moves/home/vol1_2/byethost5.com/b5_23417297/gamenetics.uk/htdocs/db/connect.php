<?php
$servername = "localhost";
$username = "gameneti_game";
$password = "NewGameShow2019";

try {
    $conn = new PDO("mysql:host=$servername;dbname=gameneti_game", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>
