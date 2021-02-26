<?php
    // session_start();
    require_once "connection.php";
    require_once "header.php";
    
    $id = $_SESSION["id"];
    //Postavljanje početnih vrednosti
    $q = "SELECT * FROM profiles WHERE user_id = $id";
    $result = $conn->query($q);
    $red = $result->fetch_assoc();
    $name = $red['name'];
    $surname = $red['surname'];
    $gender = $red['gender'];
    $dateOfBirth = $red['dob'];
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
        $name = $surname = $gender = $dateOfBirth = "";
        $nameErr = $surnameErr = $genderErr = $dateOfBirthErr ="";
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
        }
    ?>

    <div class="log">
    <form action="#" method="post">
        
            <label for="">Name: </label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>

            <br>
            <label for="">Surname: </label>
            <input type="text" name="surname" value="<?php echo $surname; ?>">
            <span class="error">* <?php echo $surnameErr; ?></span>
        
            <br>
            <label for="">Gender: </label>
            <input type="radio" name="gender" value="m" <?php if($gender=="m"){echo 'checked';} ?>>Male
            <input type="radio" name="gender" value="f" <?php if($gender=="f"){echo 'checked';} ?>>Female
            <input type="radio" name="gender" value="o" <?php if($gender!="m" && $gender!="f"){echo 'checked';} ?>>Other
        
            <br>
            <label for="">Date of birth: </label>
            <input type="date" name="dob" value="<?php echo $dateOfBirth; ?>">
            <span class="error"><?php echo $dateOfBirthErr; ?></span>
        
            <br>
            <input type="submit" value="Submit">
        
    </form>
    </div>

    <?php
        if($prikazi){
            $q = "UPDATE profiles
            SET
            `name` = '$name', `surname` = '$surname', `dob` = '$dateOfBirth', `gender` = '$gender'
            WHERE user_id = $id";
            $conn->query($q);
        }
    ?>
</body>
</html>

