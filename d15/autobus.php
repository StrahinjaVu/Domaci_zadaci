<?php

class Autobus{
    private $regBroj;
    private $brojSedista;


    //KONSTRUKTOR
    public function __construct($rb, $bs){
        $this->setRegBroj($rb);
        $this->setBrojSedista($bs);
    }

    //SETERI
    public function setRegBroj($rb){
        $this->regBroj = $rb;
    }

    public function setBrojSedista($bs){
        $this->brojSedista = $bs;
    }

    //GETERI
    public function getRegBroj(){
        return $this->regBroj;
    }

    public function getBrojSedista(){
        return $this->brojSedista;
    }

    public function stampaj(){
        echo "<p>Tablice: $this->regBroj &nbsp Broj sedista u autobusu: $this->brojSedista kom</p>";
    }
}

$a1 = new Autobus("NI 123 RT", 51);
$a2 = new Autobus("BG 008 GU", 63);
$a3 = new Autobus("NS 114 SV", 84);
$autobusi = array($a1, $a2, $a3);

// IPIS PODATAKA SVIH AUTOBUSA
foreach($autobusi as $bus){
    $bus->stampaj();
}
echo "<hr>";
// UKUPNO SEDISTA
function ukupnoSedista($autobusi){
    $suma = 0;
    foreach($autobusi as $bus){
            $suma += $bus->getBrojSedista();
        }
        return $suma;
}

echo "Ukupan broj sedista je: " . ukupnoSedista($autobusi);

echo "<hr>";
// KOJI BUS IMA MAX SEDISTA
function maxSedista($autobusi){
    $max = $autobusi[0]->getBrojSedista();
    foreach($autobusi as $bus){
        if($bus->getBrojSedista() >= $max){
            $max = $bus->getBrojSedista();
        }
    }
    foreach($autobusi as $bus){
        if($bus->getBrojSedista() == $max){
            $bus->stampaj();
        }
    }
}

echo "<p>Najvisa sedista ima: </p>";
maxSedista($autobusi);
echo "<hr>";

// RASPODELA LJUDI U BUSEVE
function ljudi($autobusi){
    $ljudi = 198;
    $suma = 0;
    foreach($autobusi as $bus){
            $suma += $bus->getBrojSedista();
        }
    foreach($autobusi as $bus){
        if($suma >= $ljudi){
            return true;
        }else{
            return false;
        }
    }
}

echo ljudi($autobusi);