<?php


function digitron($br1, $br2, $znak){
    if($znak == "+"){
        $rez = $br1 + $br2;
    }
    elseif($znak == "-"){
        $rez = $br1 - $br2;
    }
    elseif($znak == "*"){
        $rez = $br1 * $br2;
    }
    elseif($znak == "/"){
        $rez = $br1 - $br2;
    }
    else {
        echo "Ne valja";
    }
    echo "$br1 $znak $br2 = $rez";
    return $rez;
    
}

digitron(5,7,"*");

?>