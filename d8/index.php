<?php
// 1. Zadatak
    $v = 15;
    $n = 7;
    $brlj = $v / $n;
    $visak = $n - ($v / 3);
    if($brlj % 3 == 0){
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