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
</head>
<body>
        <?php
        // $id = $_SESSION['id'];

        // if(empty($_GET['id'])){
        //     $sql = "SELECT * FROM followers
        //     WHERE sender_id = $id";
        //     $result = $conn->query($sql);
        //         if(!$result){
        //             echo "<div class='greska'>Greska: " . $conn->error . "</div>";
        //         }
        // }

        $clanovi = "SELECT profiles.name, profiles.surname, profiles.dob, profiles.gender, users.username
        FROM users
        INNER JOIN profiles
        ON profiles.user_id = users.id
        WHERE users.id = $id";

        $result = $conn->query($clanovi);
        if(!$result->num_rows){
                echo "<p class='info'>Trenutno u bazi nema korisnika!</p>";
            }
            else{
            echo "<table style='overflow-x:auto;' class='members'>";
            echo "<tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Date of birth</th> 
                <th>Gender</th>
                <th>About me</th>
            </tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['surname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <a href="followers.php"></a>
</body>
</html>