-- Ubacivanje podataka u tabelu filmovi
INSERT INTO `filmovi` (`id`, `naslov`, `reziser`, `god_izdavanja`, `zanr`, `ocena`) VALUES (1, "The Shawshank Redemption", "Frank Darabont", 1994, "Drama", 9.3),
(2, " The Godfather", "Francis Ford Coppola", 1972, "Krimi", 9.2),
(3, "The Lord of the Rings: The Return of the King", "Peter Jackson", 2003, "Avantura", 8.9),
(4, "Saving Private Ryan", "Steven Spielberg", 1998, "Ratni", 8.6),
(5, "Interstellar", "Christopher Nolan", 2014, "Sci-fi", 8.3),
(6, "Bloodshoot", "Dave Wilson", 2020, "Sci-fi", 5.7);


-- Selektovati sve filmove koji su drama, krimi ili avantura
SELECT * FROM `filmovi` WHERE `zanr` IN ("drama", "krimi", "avantura");

-- Selektovati sve filmove kojima je ocena između 6 i 9
SELECT * FROM `filmovi` WHERE `ocena` BETWEEN 6 AND 9;

-- Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i poređati ih abecednim redom
SELECT `reziser` FROM `filmovi` WHERE `god_izdavanja` > 2003;

-- Selektovati sve filmove tako da im zanr nije komedija
SELECT * FROM `filmovi` WHERE NOT `zanr` = "sci-fi";

-- Prikazati sve informacije o najbojle rangiranom filmu
SELECT * FROM `filmovi` ORDER BY `ocena` DESC LIMIT 1;

-- Prikazati sve informacije o najbolje rangiranoj drami
SELECT * FROM `filmovi` WHERE `zanr` = "drama" ORDER BY `ocena` DESC LIMIT 1;

-- Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene
SELECT `reziser` FROM `filmovi` ORDER BY `ocena` DESC LIMIT 3;

-- Selektovati sve žanrove filmova, bez ponavljanja
SELECT DISTINCT `zanr` FROM `filmovi`;

-- Selektovati sve filmove u obliku naslov (režiser)
SELECT CONCAT (`naslov`,"(",`reziser`,")") AS "Naslovi sa reziserima" FROM `filmovi`;

-- Selektovati sve filmove u obliku naslov(reziser) - godina izdanja.
SELECT CONCAT (`naslov`, "(", `reziser`, ")", " ", "-", " ", `god_izdavanja`) AS "Naslovi sa reziserima i godinom" FROM `filmovi`;



