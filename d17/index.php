<?php

require_once "student.php";
require_once "samofinansirajuci.php";
require_once "budzetski.php";

$s1 = new Budzetski("Strahinja", 180, 9);
$s2 = new Samofinansirajuci("Pera", 80, 7);
$s3 = new Samofinansirajuci("Mika", 280, 10);
$s4 = new Budzetski("Tijana", 120, 8);

$studenti = [$s1, $s2, $s3, $s4];


foreach($studenti as $s){
    echo $s->ispis();
}
echo "<hr>";
function najvecaSkolarina($niz){
    $max = $niz[0]->skolarina(rand(35,60));
    foreach($niz as $s){
        if($s->skolarina(rand(35,60)) > $max){
            $max = $s->skolarina(rand(35,60));
        }
    }
    return $max;
}

echo najvecaSkolarina($studenti);

echo "<hr>";
function prosek($niz){
    $suma = 0;
    $br = 0;
    foreach($niz as $s){
        $suma += $s->skolarina(rand(35,60));
        $br++;
    }
    return $prosek = $suma / $br;
}

echo "<p>Prosek skolarine: </p>";
echo prosek($studenti);

echo "<hr>";

function odnos($niz){
    $suma = 0;
    $br = 0;
    $broj = rand(35,60);
    foreach($niz as $s){
        $suma += $s->skolarina($broj) / $s->getOsvojeniESPB();
        $br++;
    }
    return $prosek = $suma / $br;
}

echo odnos($studenti);

echo "<hr>";

function minESPB($niz){
    $minStudent = [];
    $min = $niz[0]->getOsvojeniESPB();
    $br = 0;
    foreach($niz as $s){
        if($s->getOsvojeniESPB() < $min){
            $min = $s->getOsvojeniESPB();
        }
    }
    foreach($niz as $s){
        if($min == $s->getOsvojeniESPB()){
            $minStudent[] = $s;
            $br++;
        }
    }
    if($br > 1){
        return najvecaSkolarina($studenti)->ispis();
    }
    else{
        return $minStudent[0]->ispis();
    }
}

echo "Student sa minimalnim brojem ESPB je: ";
minESPB($studenti);