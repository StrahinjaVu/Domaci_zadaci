<?php
session_start();
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
    <div class="register">
    <?php
        $name = $surname = $gender = $dateOfBirth = $username = $password = $rePassword = "";
        $nameErr = $surnameErr = $usernameErr = $passwordErr = $rePasswordErr = "";
        $prikazi = false;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $prikazi = true;

            if(empty($name)){
                $prikazi = false;
                $nameErr = "Enter your name";
            }
            elseif(ctype_alpha(str_replace(' ', '', $name)) === false){
                $prikazi = false;
                $nameErr = "Field can only contain letters and space";
            }
            elseif(strlen($name) > 50){
                $prikazi = false;
                $nameErr = "You have more than 50 characters";
            }
            else{
                $name = trim($name);
                $name = preg_replace('/\s\s+/', ' ', $name);
            }
                
                
            //validacija za prezime
            if(empty($surname)){
                $prikazi = false;
                $surnameErr = "Enter your surname";
            }
            elseif(ctype_alpha(str_replace(' ', '', $surname)) === false){
                $prikazi = false;
                $surnameErr = "Field can only contain letters and space";
            }
            elseif(strlen($surname) > 50){
                $prikazi = false;
                $surnameErr = "You have more than 50 characters";
            }
            else{
                $surname = trim($surname);
                $surname = preg_replace('/\s\s+/', ' ', $surname);
            }

            //validacija za pol
            if(empty($_POST["gender"])){
                $prikazi = false;
                $genderErr = "Choose gender";
            }
            else{
                $gender = $_POST["gender"];
                $prikazi = true;
            }

            //validacija za datum
            if(empty($_POST["dob"])){
                $prikazi = true;
                $dateOfBirth = $_POST["dob"];
            }
            elseif(($_POST["dob"]) < "1900-01-01"){
                $prikazi = false;
                $dateOfBirthErr = "Enter date";
            }
            else{
                $prikazi = true;
                $dateOfBirth = $_POST["dob"];
            }

            //validacija za username
            if(empty($_POST["username"])){
                $prikazi = false;
                $usernameErr = "Enter username";
            }
            elseif(strpos($_POST["username"], ' ') !== false){
                $prikazi = false;
                $usernameErr = "Username has space"; 
            }
            elseif(strlen($_POST["username"]) < 5 || strlen($_POST["username"]) > 50){
                $prikazi = false;
                $usernameErr = "Username must be between 5 and 50 characters";
            }
            else{
                $username = $_POST["username"];
                $prikazi = true;
            }

            //validacija za password
            if(empty($_POST["password"])){
                $prikazi = false;
                $passwordErr = "Enter password";
            }
            elseif(strpos($_POST["password"], ' ') !== false){
                $prikazi = false;
                $passwordErr = "Your password has space"; 
            }
            elseif(strlen($_POST["password"]) < 5 || strlen($_POST["password"]) > 25){
                $prikazi = false;
                $passwordErr = "Password must be between 5 and 25 characters";
            }
            else{
                $password = ($_POST["password"]);
                $prikazi = true;
            }

            if(empty($_POST["re_password"])){
                $prikazi = false;
                $rePasswordErr = "Re-enter password";
            }
            elseif(strpos($_POST["re_password"], ' ') !== false){
                $prikazi = false;
                $rePasswordErr = "Your password has space"; 
            }
            elseif(strlen($_POST["re_password"]) < 5 || strlen($_POST["password"]) > 25){
                $prikazi = false;
                $rePasswordErr = "Password must be between 5 and 25 characters";
            }
            elseif($_POST["re_password"] != $_POST["password"]){
                $prikazi = false;
                $rePasswordErr = "Passwords don't match";
            }
            else{
                $rePassword = ($_POST["re_password"]);
                $prikazi = true;
            }
        }

    ?>
    
    <!-- forma -->
    <div class="container">
    <div class="row">
        <form class="col-12" action="" method="post">
            <p>
                <label for="">Name: </label>
                <input type="text" name="name">
                <span class="error">* <?php echo $nameErr; ?></span>
            </p>

            <p>
                <label for="">Surname: </label>
                <input type="text" name="surname">
                <span class="error">* <?php echo $surnameErr; ?></span>
            </p>

            <p>
            <label for="">Gender: </label>
            <input type="radio" name="gender" id="" value="z">Female
            <input type="radio" name="gender" id="" value="m">Male
            <input type="radio" name="gender" id="" value="d" checked>Other
            </p>

            <p>
                <label for="">Date of birth: </label>
                <input type="date" name="dob" id="">
            </p>

            <p>
                <label for="">Username: </label>
                <input type="text" name="username">
                <span class="error">* <?php echo $usernameErr; ?></span>
            </p>

            <p>
                <label for="">Password: </label>
                <input type="password" name="password" id="">
                <span class="error">* <?php echo $passwordErr; ?></span>
            </p>

            <p>
                <label for="">Retype password: </label>
                <input type="password" name="re_password" id="">
                <span class="error">* <?php echo $rePasswordErr; ?></span>
            </p>

            <p>
                <input type="submit" name="submit" value="Submit">
            </p>
        </form>
    </div>
    </div>

    <!-- <h2>Uneli ste podatke</h2> -->

    <?php
        // echo $name;
        // echo "<br>";
        // echo $surname;
        // echo "<br>";
        // echo $gender;
        // echo "<br>";
        // echo $dateOfBirth;
        // echo "<br>";
        // echo $username;
        // echo "<br>";
        // echo $password;
        // echo "<br>";
        // echo $rePassword;
    ?>

    <?php

        if($prikazi){
            
            require_once "connection.php";

            $name = $conn->real_escape_string($name);
            $surname = $conn->real_escape_string($surname);
            $gender = $conn->real_escape_string($_POST["gender"]);
            $dateOfBirth = $conn->real_escape_string($_POST["dob"]);
            $username = $conn->real_escape_string($_POST["username"]);
            $password = $conn->real_escape_string(md5($_POST["password"]));
            $rePassword = $conn->real_escape_string(md5($_POST["re_password"]));


            $s = "SELECT username FROM users
            WHERE username = '$username'";

            $result = $conn->query($s);
            if($result->num_rows != 0){
                echo "Try another nickname";
            }else{
                $q = "INSERT INTO `users`(`username`, `pass`)
                VALUES ('$username', '$password')";
                $result = $conn->query($q);
                $t = "SELECT id FROM users
                WHERE username = '$username'";
                $result = $conn->query($t);
                $red = $result->fetch_assoc();
                $id = $red['id'];
                $profili = "INSERT INTO `profiles`(`name`, `surname`, `gender`, `dob`, `user_id`)
                VALUES ('$name', '$surname', '$gender', '$dateOfBirth', '$id')";
                if($conn->query($profili)){
                echo "<p id='unos'>Successfull entry</p>";
                }
                else{
                    echo "<p>Error, try again: " . $conn->error . "</p>";
                }
                header('location: login.php');
            }
        }
    ?>
    </div>
</body>
</html>