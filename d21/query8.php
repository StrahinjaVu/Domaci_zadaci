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
    //Za svakog rezisera prikazati po tabelu sa njegovim filmovima
    $s = "SELECT ime AS 'ime', prezime AS 'prezime' FROM reziser";
    $result = $conn->query($s);
    if(!$result->num_rows){
        echo "<p>Trenutno u bazi nema filmova</p>";
    }
    else{
        echo "<span id='zanrovi'>Reziseri: </span>";
        foreach($result as $row){
            $reziser = $row['ime']  .' '. $row['prezime'];
            echo "<a href='#$reziser'>$reziser</a>";
        }
    }

    // Tabele za svaki zanr
    $result = $conn->query($s);
    if($result->num_rows){
        foreach($result as $row){
            $reziser = $row['ime']  .' '. $row['prezime'];
            $reziser1 = $row['prezime'];
            echo "<h3  class='italic' id='reziser'>$reziser</h3>";
            echo "<table class='tabela'>";
            echo "<tr id='brown'>
                <th>Naslov filma</th>
                <th>Ime</th>
                <th>Prezime</th>
                </tr>";
                $s2 = "SELECT reziser.ime AS 'ime', reziser.prezime AS 'prezime', filmovi.naslov 
                FROM reziser
                INNER JOIN filmovi
                ON filmovi.reziser_id = reziser.id
                WHERE prezime LIKE '" . $reziser1 . "%'";
                $filmovi = $conn->query($s2);
                foreach($filmovi as $film){
                    echo "<tr>";
                    echo "<td>" . $film['naslov'] . "</td>";
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