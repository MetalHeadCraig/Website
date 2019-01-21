<?php
include 'connect.php';

try {
// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) 
VALUES (:firstname, :lastname, :email, :password)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

// insert Craig's data
$firstname = "Craig";
$lastname = "Anning";
$email = "craig_anning@hotmail.com";
$password = password_hash("craigpassword", PASSWORD_DEFAULT); 
$stmt->execute();

// insert Tim's data
$firstname = "Tim";
$lastname = "Saunders";
$email = "saundersmtim@gmail.com";
$password = password_hash("timpassword", PASSWORD_DEFAULT);
$stmt->execute();

// insert Cameron's Data
$firstname = "Cameron";
$lastname = "Brock";
$email = "cameronbrock92@gmail.com";
$password = password_hash("cameronpassword", PASSWORD_DEFAULT);
$stmt->execute();

echo "New records for Craig, Tim and Cameron inserted to table users successfully";
}

catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

$conn = null;




?>