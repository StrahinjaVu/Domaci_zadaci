<?php
require_once "connection.php";
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
    // Tabelarno prikazati sve informacije o svim filmovima iz tabele filmovi(zajedno sa reziserom i zanrovima), abecedno po nazivu filma.
    $s = "SELECT filmovi.naslov, filmovi.godina, filmovi.ocena, reziser.ime, reziser.prezime, zanrovi.naziv
    FROM reziser
    INNER JOIN filmovi
    ON reziser.id = filmovi.reziser_id
    INNER JOIN film_zanr
    ON film_zanr.filmovi_id = filmovi.id
    INNER JOIN zanrovi
    ON film_zanr.zanrovi_id = zanrovi.id
    ORDER BY naslov";
    $result = $conn->query($s);
    if(!$result->num_rows){
    echo "<p class='info'>Trenutno u bazi nema filmova!</p>";
    }
    else{
        echo "<table class='tabela'>";
        echo "<tr id='blue'>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Ocena</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Naziv</th>
            </tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row['naslov'] . "</td>";
                echo "<td>" . $row['godina'] . "</td>";
                echo "<td>" . $row['ocena'] . "</td>";
                echo "<td>" . $row['ime'] . "</td>";
                echo "<td>" . $row['prezime'] . "</td>";
                echo "<td>" . $row['naziv'] . "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    
    ?>
</body>
</html>