<?php
    session_start();
    require_once "connection.php";
    if(isset($_SESSION['id'])){
        header('location: followers.php');
    }
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
    
    <div class="row">
    <div class="land" class="col-4">
        <h1>Stay connected with us</h1>
        <img src="images/mob.png" alt="">
    </div>
    
    <div class="button" class="col-8">
    <button class="first"><a href="login.php">Login</a></button>
    <button class="second"><a href="register.php">Register</a></button>
    </div>
    </div>
    
</body>
</html>