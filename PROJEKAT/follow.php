<?php
session_start();
require_once "connection.php";

$id = $_SESSION['id'];


if(!empty($_GET["follow_back"])){
    $friendId = $conn->real_escape_string($_GET['follow_back']);

    $sql = "SELECT * FROM followers
    WHERE sender_id = $id
    AND receiver_id = $friendId";

    $result = $conn->query($sql);
    if(!$result->num_rows){
    $sql = "INSERT INTO followers(sender_id, receiver_id)
    VALUES ($id, $friendId)";
    $result1 = $conn->query($sql);
    if(!$result1){
        die("Greska: " . $conn->error);
    }
}
}


header("Location: followers.php"); //Redirekcija na stranicu followers.php