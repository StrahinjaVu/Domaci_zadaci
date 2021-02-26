<?php
require_once "connection.php";

$s = "ALTER TABLE profiles ADD bio TEXT AFTER surname";
$result = $conn->query($s);
if($conn->query($s)){
    echo "<p>Uspesno izvrseno</p>";
}else{
    echo "<p>Greska prilikom izvrsenja niza upita: " . $conn->error . "</p>";
}