<?php
include 'connect.php';

try {
    $sql = "CREATE DATABASE IF NOT EXISTS game";
    $conn->exec($sql);
    $sql = "use game";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS article (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, /* article id */
            aname VARCHAR(50) NOT NULL,  /* article name */
            author int(11) NOT NULL, /* who posted */
            article text(5000), /* the actual article */
            adate TIMESTAMP /* date posted, could add time aswel */
            )";
    $conn->exec($sql);
    echo "Database \"game\" and Table \"article\" created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>