<?php

$servername = "localhost";
$user = "admin";
$pass= "mojasifra993";
$db = "mreza";

$conn = new mysqli($servername, $user, $pass, $db);
if($conn->connect_error){
    die("Error connecting to database: " . $conn->connect_error);
}