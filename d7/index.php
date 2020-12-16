<?php
    // Zadatak 1
    $faren = 85;
    $celzijus = ($faren - 32) * 5/9;
    echo "Temperatura u celzijusima:";
    echo $celzijus;
    echo "<br>";
    $kelvin = $celzijus + 273.15;
    echo "<br>";
    echo "Temperatura u kelvinima:";
    echo $kelvin;
    echo "<br><br>";
    $cel = 29.4;
    $farenh = (9/5 * 29.4) + 32;
    echo "Temperatura u farenhajtima:";
    echo $farenh;
    echo "<br><br>";
    // Zadatak 2
    $n = 125;
    $a = 43 + 45;
    $presotalo = $n - $a;
    echo "Preostale strane za citanje:";
    echo $presotalo;
    echo "<br><br>";
    // Zadatak 3
    $p = 2000;
    $m = 1500;
    $k = 900;
    $ukupnoPara = 4400;
    $kusurPera = ($ukupnoPara / 2) - $m;
    echo "Perin kusur:";
    echo $kusurPera;
    $kusurMika = ($ukupnoPara / 2) -$p;
    echo "<br>";
    echo "Mikin kusur:";
    echo $kusurMika;
?>