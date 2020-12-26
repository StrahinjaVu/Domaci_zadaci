<?php

// 11. Domaci 1.) Odrediti proizvod brojeva od $n do $m koji su deljivi sa 7 a nisu sa 3, a potom od njega oduzeti zbir brojeva od $n do $m koji su deljivi sa 3 a nisu sa 7:

    $n = 4;
    $m = 20;
    $p = 1;
    $sum = 0;
    $raz = 0;
    while($n <= $m)
    {
        if($n % 7 == 0 && $n % 3 != 0){
            if($n % 7 == 0 && $n % 3 != 0){
            $sum += $n;
        }
            $p *= $n;
            
        }
        $raz = $p - $sum;
        $n++;
    }
    echo "<p> Razlika sa WHILE petljom je: $raz </p>";

    echo "<hr>";

    // 1. Zadatak ali sa  FOR

    $n = 4;
    $m = 20;
    $p = 1;
    $sum = 0;
    $raz = 0;
    for($i = $n; $i <= $m; $i++){
        if($i % 7 == 0 && $i % 3 != 0){
            if($i % 7 == 0 && $i % 3 != 0){
            $sum += $i;
        }
            $p *= $i;
            
        }
        $raz = $p - $sum;
    }
    echo "<p> Razlika sa FOR petljom je: $raz</p>";

    echo "<hr>";
    // 2. Zadatak Odrediti sumu kubova neparnih brojeva od $n do $m
    // WHILE petlja
    $n = 3;
    $m = 7;
    $sumaKub = 0;
    while($n <= $m){
        if($n % 2 != 0){
            $sumaKub += $n**3;
        }
        $n++;
    }
    echo "<p> Suma kubova sa WHILE petljom je: $sumaKub</P>";

    echo "<hr>";
    // FOR petlja
    $n = 3;
    $m = 7;
    $sumaKub = 0;
    for($i = $n; $i <= $m; $i++){
        if($i % 2 != 0){
            $sumaKub += $i**3;
        }
    }
    echo "<p> Suma kubova sa FOR petljom je: $sumaKub</p>";


?>