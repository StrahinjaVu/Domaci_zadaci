<?php
require_once "connection.php";
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        body{
            background: url("images/isom.jpg") center / cover no-repeat;
            height: auto;
            margin: 0;
        }
    </style>
</head>
<body>
    
    <?php
    if(empty($_SESSION['id'])){
        header('Location: login.php');
    }

    $id = $_SESSION['id']; // id logovanog korisnika

    if(!empty($_GET["follow"])){
        $friendId = $conn->real_escape_string($_GET['follow']);

        $sql = "SELECT * FROM followers
        WHERE sender_id = $id
        AND receiver_id = $friendId";

        $result = $conn->query($sql);
        if(!$result->num_rows){
        $sql = "INSERT INTO followers(sender_id, receiver_id)
        VALUES ($id, $friendId)";
        $result1 = $conn->query($sql);
        if(!$result1){
            echo "<div class='greska'>Greska: " . $conn->error . "</div>";
        }
    }
    }
    if(!empty($_GET["unfollow"])){
        $friendId = $conn->real_escape_string($_GET['unfollow']);

        $sql = "DELETE FROM followers
        WHERE sender_id = $id
        AND receiver_id = $friendId";

        $result = $conn->query($sql);
        if(!$result){
            echo "<div class='greska'>Greska: " . $conn->error . "</div>";
        }
    }


    $pratioci = "SELECT CONCAT(profiles.name, ' ', profiles.surname) AS 'Ime i prezime', users.id, users.username AS 'Korisnicko ime'
    FROM users
    INNER JOIN profiles
    ON profiles.user_id = users.id
    WHERE users.id != $id";

    $result = $conn->query($pratioci);
    if(!$result->num_rows){
            echo "<p class='info'>Trenutno u bazi nema korisnika!</p>";
        }
        else{
        echo "<table style='overflow-x:auto;' class='members'>";
        echo "<tr>
            <th>Ime i prezime</th>
            <th>Korisnicko ime</th>
            <th>Akcije</th>
        </tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>" . $row['Ime i prezime'] . "</td>";
            echo "<td>" . $row['Korisnicko ime'] . "</td>";
            $friendId = $row['id'];

            // Ispitujemo da li pratim korisnika
            $sql1 = "SELECT * FROM followers
            WHERE sender_id = $id
            AND receiver_id = $friendId";
            $result1 = $conn->query($sql1);
            $f1 = $result1->num_rows; // 0 ili 1 

            // Ispitujemo da li korisnik prati mene
            $sql2 = "SELECT * FROM followers
            WHERE sender_id = $friendId
            AND receiver_id = $id";
            $result2 = $conn->query($sql2);
            $f2 = $result2->num_rows; // 0 ili 1 

            if($f1 == 0){
                if($f2 == 0){
                    $text = "Zaprati";
                }
                else{
                    $text = "Uzvrati pracenje";
                }
                echo "<td> <a href='followers.php?follow=$friendId'>$text</a> </td>";
            }
            else{
                echo "<td> <a href='followers.php?unfollow=$friendId'>Otprati</a> </td>";
            }

            
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

</body>
</html>

