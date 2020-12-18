<?php
    // Zadatak 1
    $faren = 50;
    $kelvin = 283.15;
    $FuK = ($faren - 32) / 1.8 + 273.15;
    $KuF = ($kelvin - 273.15) * 1.8 + 32;
    echo "<p>Rezultat konvertovanja u kelvine: $FuK</p>";
    echo "<p>Rezultat konvertovanja u kelvine: $KuF</p>";
    
    // Zadatak 2
    $n = 125;
    $a = 43;
    $presotalo = $n - (2 * $a + 2);
    echo "Preostale strane za citanje:";
    echo $presotalo;
    echo "<br><br>";
    // Zadatak 3
    $p = 2000;
    $m = 1500;
    $k = 900;
    $ukupnoPara = ($p + $m) - $k;
    $kusurPera = $p - ($ukupnoPara / 2);
    echo "Perin kusur:";
    echo $kusurPera;
    $kusurMika = $m - ($ukupnoPara / 2);
    echo "<br>";
    echo "Mikin kusur:";
    echo $kusurMika;
?>