<?php
session_start();
if(empty($_SESSION['id'])){
    header('location: login.php');
}
$clan=$_SESSION['full_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
    echo "<p id='hello'>Hello  $clan</p>";
    ?>
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="desno"><a href="index.php">Home</a></li>
                <li class="desno"><a href="followers.php">Friends</a></li>
                <li class="desno"><a href="changeProfile.php">Change profile</a></li>
                <li class="desno"><a href="changePass.php">Change password</a></li>
                <li class="desno" style=float:right><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
