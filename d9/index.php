<?php

// Jedan butik ima radno vreme od 9h do 20h radnim danima, a vikendom od 10h do 18h. Preuzeti dan i vreme sa računara i ispitati da li je butik trenutno otvoren.

$vreme = date("G");
$dan = date("N");

if($dan >= 6){
    if($vreme < 10){
        echo "Butik je zatvoren";
    }
    elseif($vreme >= 18){
        echo "Butik je zatvoren";
    }
    else {
        echo "Butik je otvoren";
    }
    }
    if($dan <= 5){
    if($vreme < 9){
            echo "Butik je zatvoren";
        }
        elseif($vreme >= 20){
            echo "Butik je zatvoren";
        }
        else {
            echo "Butik je otvoren";
        }
    }




// Zadatak sa stanovnicima
/*Ukoliko je procenat pozitivno testiranih stanovnika u odnosu na ukupno testirane stanovnike u jednom danu veći od 30% ili ukoliko je procenat pozitivno testiranih stanovnika u jednom danu veći od 10% ukupnog broja stanovnika te zemlje, automatski se uvodi vanredno stanje*/

echo "<br>";
$ukBrStan = 500;
$brTest = 400;
$ukbrPoztest = 300 ; 
$procPoztest = ($ukbrPoztest / $brTest) * 100; 
$procPozUkBrStan = ($ukbrPoztest / $ukBrStan) * 100; 

if($procPoztest > 30 || $procPozUkBrStan > 10) {
    echo "<p style='color:red;'>VANREDNO STANJE</p>";
}


?>