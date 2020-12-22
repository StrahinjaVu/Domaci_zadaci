<?php
// 1. Zadatak
    $v = 46;
    $n = 16;
    $visak = round($n - ($v / 3));
    if($n * 3 < $v){
        echo "<p style='color: green;'>Da</p>";
    }
    else {
        echo "<p style='color: red;'>Ne - Visak:$visak</p>";
    }

    // 2. Zadatak
    $god = date("Y");
    $godr = 2000;
    $racunica = $god - $godr;

    if($racunica >= 18){
        echo "<p>Osoba je punoletna</p>";
    }
    else{
        echo "<p>Osoba je maloletna</p>";
    }
    ?>