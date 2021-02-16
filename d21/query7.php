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
    // Za svaki zanr izbaci filmove koji su za taj zanr, po nazivu filma

    $s = "SELECT naziv AS 'zanr' FROM zanrovi";
    $resultat = $conn->query($s);
    if(!$resultat->num_rows){
        echo "<p>Trenutno u bazi nema filmova</p>";
    }
    else{
        echo "<span id='zanrovi'>Zanrovi: </span>";
        foreach($resultat as $row){
            $zanr = $row['zanr'];
            echo "<a href='#$zanr'>$zanr</a>";
        }
    }

    // Tabele za svaki zanr
    $result = $conn->query($s);
    if($result->num_rows){
        foreach($result as $row){
            $zanr = $row['zanr'];
            echo "<h3  class='italic' id='zanr'>$zanr</h3>";
            echo "<table class='tabela'>";
            echo "<tr id='green'>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Ocena</th>
                <th>Zanr</th>
                </tr>";
                $s2 = "SELECT filmovi.naslov, filmovi.godina, filmovi.ocena, zanrovi.naziv
                FROM filmovi
                INNER JOIN film_zanr
                ON film_zanr.filmovi_id = filmovi.id
                INNER JOIN zanrovi
                ON film_zanr.zanrovi_id = zanrovi.id
                WHERE naziv LIKE '" . $zanr . "%'
                ORDER BY naslov";
                $filmovi = $conn->query($s2);
                foreach($filmovi as $film){
                    echo "<tr>";
                    echo "<td>" . $film['naslov'] . "</td>";
                    echo "<td>" . $film['godina'] . "</td>";
                    echo "<td>" . $film['ocena'] . "</td>";
                    echo "<td>" . $film['naziv'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
    }
    ?>
</body>
</html>