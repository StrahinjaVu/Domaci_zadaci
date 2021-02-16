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
    // Za svaku godinu koja postoji u bazi prikazati po jednu tabelu, a u svakoj tabeli informacije o filmovima koji su izašli te godine, abecedno po imenu režisera
    $s = "SELECT godina FROM filmovi";
    $result = $conn->query($s);
    if(!$result->num_rows){
        echo "<p>Trenutno u bazi nema filmova</p>";
    }
    else{
        echo "<span id='zanrovi'>Godine: </span>";
        foreach($result as $row){
            $godina = $row['godina'];
            echo "<a href='#$godina'>$godina</a>";
        }
    }

    // Tabele za njih
    $result = $conn->query($s);
    if($result->num_rows){
        foreach($result as $row){
            $godina = $row['godina'];
            echo "<h3  class='italic' id='godina'>$godina</h3>";
            echo "<table class='tabela'>";
            echo "<tr id='purple'>
                <th>Naslov filma</th>
                <th>Zanr</th>
                <th>Godina izdanja</th>
                <th>Ocena</th>
                <th>Ime</th>
                <th>Prezime</th>
                </tr>";
                $s2 = "SELECT filmovi.naslov, filmovi.godina, filmovi.ocena, reziser.ime, reziser.prezime, zanrovi.naziv
                FROM reziser
                INNER JOIN filmovi
                ON reziser.id = filmovi.reziser_id
                INNER JOIN film_zanr
                ON film_zanr.filmovi_id = filmovi.id
                INNER JOIN zanrovi
                ON film_zanr.zanrovi_id = zanrovi.id
                WHERE godina LIKE '" . $godina . "%'
                ORDER BY ime";
                $filmovi = $conn->query($s2);
                foreach($filmovi as $film){
                    echo "<tr>";
                    echo "<td>" . $film['naslov'] . "</td>";
                    echo "<td>" . $film['naziv'] . "</td>";
                    echo "<td>" . $film['godina'] . "</td>";
                    echo "<td>" . $film['ocena'] . "</td>";
                    echo "<td>" . $film['ime'] . "</td>";
                    echo "<td>" . $film['prezime'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
    }
    ?>
</body>
</html>