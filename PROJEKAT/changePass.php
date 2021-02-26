<?php
// session_start();
require_once "connection.php";
require_once "header.php";

$id = $_SESSION["id"];
$q = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($q);
$row = $result->fetch_assoc();
$oldPasswordDb = $row['pass'];
    if(!$result){
        echo "Incorrect password!";
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

        $oldPassword = $newPassword = $rePassword = "";
        $oldPasswordErr = $newPasswordErr = $rePasswordErr = "";
        $prikazi = false;


        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $oldPassword = $_POST['oldPass'];
            $newPassword = $_POST['newPass'];
            $rePassword = $_POST['rePass'];
            $prikazi = true;

            //validacija za stari password
            if(empty($_POST["oldPass"])){
                $prikazi = false;
                $oldPasswordErr = "Enter password!";
            }
            elseif(md5($_POST["oldPass"]) != $oldPasswordDb){
                $prikazi = false;
                $oldPasswordErr = "Wrong password!";
            }

            //validacija za novi password
            if(empty($_POST["newPass"])){
                $prikazi = false;
                $newPasswordErr = "Enter password!";
            }
            elseif(strpos($_POST["newPass"], ' ') !== false){
                $prikazi = false;
                $newPasswordErr = "Your password has space"; 
            }
            elseif(strlen($_POST["newPass"]) < 5 || strlen($_POST["newPass"]) > 25){
                $prikazi = false;
                $newPasswordErr = "Password must be between 5 and 25 characters";
            }
            else{
                $password = md5($_POST["newPass"]);
                $prikazi = true;
            }

            //validacija za re_password
            if(empty($_POST["rePass"])){
                $prikazi = false;
                $rePasswordErr = "Re-enter password";
            }
            elseif(strpos($_POST["rePass"], ' ') !== false){
                $prikazi = false;
                $rePasswordErr = "Your password has space"; 
            }
            elseif(strlen($_POST["rePass"]) < 5 || strlen($_POST["rePass"]) > 25){
                $prikazi = false;
                $rePasswordErr = "Password must be between 5 and 25 characters";
            }
            elseif($_POST["rePass"] != $_POST["newPass"]){
                $prikazi = false;
                $rePasswordErr = "Passwords don't match";
            }
            else{
                $rePassword = md5($_POST["rePass"]);
                $prikazi = true;
            }
        }
    ?>

    <div class="log">
    <form action="" method="POST">
        <label for="">Old password: </label>
        <input type="password" name="oldPass">
        <span class="error">* <?php echo $oldPasswordErr; ?></span>

        <br>
        <label for="">New password: </label>
        <input type="password" name="newPass">
        <span class="error">* <?php echo $newPasswordErr; ?></span>

        <br>
        <label for="">Re-type new password: </label>
        <input type="password" name="rePass">
        <span class="error">* <?php echo $rePasswordErr; ?></span>

        <br>
        <input type="submit" value="Submit">
    </form>
    </div>

    <?php
        if($prikazi){
                $q = "UPDATE users
                SET 
                `pass` = md5('$newPassword')
                WHERE id = $id";
                $conn->query($q);
            }
        ?>

</body>
</html>