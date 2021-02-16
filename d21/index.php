<?php
$servername = "localhost";
$username = "admin";
$password = "mojasifra993";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE videoteka DEFAULT CHARACTER SET utf16 COLLATE utf16_slovenian_ci ;
USE `videoteka` ;";
if ($conn->multi_query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
?>