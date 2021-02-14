<?php
$servername = "localhost";
$username = "admin";
$password = "mojasifra993";
$db = "muzika";

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
    die("Error connecting to database: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Prikazati sve kompozicije iz baze

    $s = "SELECT kompozicije.naziv AS 'Naziv kompozicije', kompozicije.god AS 'Godina', SEC_TO_TIME(kompozicije.trajanje) AS 'Trajanje', periodi.naziv AS 'Naziv perioda'
    FROM kompozicije
    INNER JOIN periodi
    ON periodi.id = kompozicije.periodi_id
    ORDER BY kompozicije.naziv;";
    $result = $conn->query($s);
    if(!$result->num_rows){
            echo "<p class='info'>Trenutno u bazi nema kompozicija!</p>";
        }
        else{
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv kompozicije</th>
                <th>Godina</th>
                <th>Trajanje</th>
                <th>Period</th>
            </tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row['Naziv kompozicije'] . "</td>";
                echo "<td>" . $row['Godina'] . "</td>";
                echo "<td>" . $row['Trajanje'] . "</td>";
                echo "<td>" . $row['Naziv perioda'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
        
    ?>
</body>
</html>