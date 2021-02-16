<?php
require_once "connection.php";


$s = "CREATE TABLE IF NOT EXISTS reziser(
    id INT UNSIGNED PRIMARY KEY,
    ime VARCHAR(45),
    prezime VARCHAR(45),
    pol CHAR(1)
)ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS zanrovi(
    id INT UNSIGNED PRIMARY KEY,
    naziv VARCHAR(45)
)ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS filmovi(
    id INT UNSIGNED PRIMARY KEY,
    naslov VARCHAR(125),
    godina SMALLINT UNSIGNED,
    ocena DECIMAL(6,2),
    reziser_id INT UNSIGNED,
    FOREIGN KEY(reziser_id) REFERENCES reziser(id)
)ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS film_zanr(
    filmovi_id INT UNSIGNED,
    zanrovi_id INT UNSIGNED,
    FOREIGN KEY(filmovi_id) REFERENCES filmovi(id),
    FOREIGN KEY(zanrovi_id) REFERENCES zanrovi(id),
    PRIMARY KEY(filmovi_id, zanrovi_id)
)ENGINE = InnoDB";


if($conn->multi_query($s)){
    echo "<p>Uspesno izvrsen niz upita</p>";
}else{
    echo "<p>Greska prilikom izvrsenja niza upita: " . $conn->error . "</p>";
}