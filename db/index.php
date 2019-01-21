<?php
include 'connect.php';

try {

    $sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    profilepic VARCHAR(255) NOT NULL,
    userlvl INT(6) DEFAULT 1,
    reg_date TIMESTAMP
    )";

    $conn->exec($sql);
    echo "Table users created successfully <br>
            click <a href=\"insert.php\">Here</a> to insert our records.";
    }


catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>