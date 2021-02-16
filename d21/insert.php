<?php
require_once "connection.php";


$s = "INSERT INTO reziser(id, ime, prezime, pol) 
VALUES
(1, 'Christopher', 'Nolan', 'Musko'),
(2, 'Steven', 'Spielberg', 'Musko'),
(3, 'Martin', 'Scorsese', 'Musko'),
(4, 'Stanley', 'Kubrick', 'Musko'),
(5, 'Alfred', 'Hitchcock', 'Musko'),
(6, 'Frank', 'Darabont', 'Musko');
INSERT INTO zanrovi(id, naziv)
VALUES
(1, 'Sci-fi'),
(2, 'Drama'),
(3, 'Akcija'),
(4, 'Komedija'),
(5, 'Triler'),
(6, 'Horor');
INSERT INTO filmovi(id, naslov, godina, ocena, reziser_id)
VALUES
(1, 'The Shawshank Redemption', 1994, 9.3, 6),
(2, 'Schindlers List', 1993, 8.9, 2),
(3, 'One-Eyed Jacks', 1961, 7.3, 4),
(4, 'Psycho', 1960, 8.5, 5),
(5, 'Goodfellas', 1990, 8.7, 3),
(6, 'Inception', 2010, 8.8, 1);
INSERT INTO film_zanr(filmovi_id, zanrovi_id)
VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 5),
(5, 3),
(6, 1);";

if($conn->multi_query($s)){
    echo "<p>Uspesno izvrsen niz upita</p>";
}else{
    echo "<p>Greska prilikom izvrsenja niza upita: " . $conn->error . "</p>";
}