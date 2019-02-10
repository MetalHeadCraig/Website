<?php
$servername = "sql309.byethost.com";
$username = "b5_23417297";
$password = "NewGameShow2019";

try {
    $conn = new PDO("mysql:host=$servername;dbname=b5_23417297_game", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>
