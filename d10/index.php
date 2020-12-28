<?php

/*  1. Zadatak / Ukoliko je zbir cifara broja jednak samom broju, na ekranu se zbir ispisuje uokviren narandžastom bojom
Npr. za broj 5 zbir cifara je 5, što je jednako unetom broju 5 */

$n = 123; 
$m = $n;
$zbirCifara = 0;
$ostatak = 0;

while($n > 0 ){
    $ostatak = $n % 10;
    $zbirCifara = $zbirCifara + $ostatak;
    round($n = $n / 10);
    }

    if($zbirCifara == $m)
    {
        echo "<p style='border: 1px solid orange';'>$zbirCifara</p>";
    }
    else{
        echo "<p style='border: 1px dotted blue'>$zbirCifara</p>";
    }



/* 2. Zadatak - Za uneti ceo broj odrediti koliko ima delioca koji su deljivi brojem 3 i neparni su.*/

echo "<hr>";

    $n =  15;
    $del = 1;
    $br = 0;
    while( $del <= $n ){
        if($n % $del == 0){
            if($del % 2 != 0 && $del % 3 == 0){
                $br++;
            }
        }
        $del++;
    }
    echo $br;

?>