<?php
    // Otvaramo sesiju na pocetku stranice
    session_start();

    require_once "connection.php";

    $usernameError = $passErr = "*";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //korisnik je poslao username i pass i pokusava logovanje
        $username = $conn->real_escape_string($_POST['username']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $val = true;
        if(empty($username)){
            $val = false;
            $usernameError = "Username cannot be left blank!";
        }
        if(empty($pass)){
            $val = false;
            $passErr = "Password cannot be left blank!";
        }
        if($val){
            // Pokusamo da ulogujemo korisnika samo ako su sva polja forme popunjena
            $sql = "SELECT * FROM users 
            WHERE username = '$username'";
            $result = $conn->query($sql);
            if($result->num_rows == 0){
                $usernameErr = "This username doesn't exist!";
            }
            else{
                // Postoji korisnicko ime, treba proveriti sifre
                $row = $result->fetch_assoc();
                $dbPass = $row['pass'];
                if($dbPass != md5($pass)){
                    $passErr = "Incorrect password!";
                }
                else{
                    // Ovde vrsimo logovanje
                    $_SESSION['id'] = $row['id'];
                    // $_SESSION['full_name'] = ...
                    $sql = "SELECT CONCAT(profiles.name, ' ',profiles.surname) AS 'full_name'
                    FROM users
                    INNER JOIN profiles
                    ON users.id = profiles.user_id
                    WHERE users.username = '$username'";

                    $result = $conn->query($sql);
                    $row=$result->fetch_assoc();
                    $_SESSION['full_name'] = $row['full_name'];

                    header('Location: followers.php');        
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to the site!</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
    
    <div class="log">
    <form  action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <span class='error'><?php echo $usernameError ?></span>

        <br>
        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass">
        <span class='error'><?php echo $passErr ?></span>

        <br>
        <input type="submit" value="Log in!">
    </form>
    </div>
    
</body>
</html>