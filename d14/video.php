<?php


class Video{
    private $naslov;
    private $trajanje;

    //KONSTRUKTOR
    public function __construct($n, $t){
        $this->setNaslov($n);
        $this->setTrajanje($t);
    }

    //SETERI
    public function setNaslov($n){
        $this->naslov = $n;
    }

    public function setTrajanje($t){
        $this->trajanje = $t;
    }

    //GETERI
    public function getNaslov(){
        return $this->naslov;
    }

    public function getTrajanje(){
        return $this->trajanje;
    }
    // kraj get i set

    public function stampaj(){
        echo "<p>Naslov:$this->naslov &nbsp Trajanje:$this->trajanje min</p>";
    }
    
}
    
    $v1 = new Video("Smesni klipovi", 50);
    $v2 = new Video("Strasni klipovi", 80);
    $v3 = new Video("18. Rodjendan", 180);
    $video = array($v1, $v2, $v3);

    for($i=0; $i<count($video); $i++){
        $video[$i]->stampaj();
    }
    echo "<hr>";

    function prosek($video){
        $sumaTrajanja = 0;
        foreach($video as $v){
            $sumaTrajanja += $v->getTrajanje();
        }
        $prosecnoTrajanje = $sumaTrajanja / count($video);
        return $prosecnoTrajanje;
    }
    echo "Prosek trajanja videa je: " . prosek($video);
    
    echo "<hr>";

    function najbliziProseku($video){
    
    $prosek = prosek($video);
    
    foreach($video as $v){
        $min = abs($v->getTrajanje() - $prosek);
        break;
    }
    foreach($video as $v){
        if($min > abs($v->getTrajanje() - $prosek)){
            $min = abs($v->getTrajanje() - $prosek);
        }
    }
    foreach($video as $v){
        if($min == abs($v->getTrajanje() - $prosek)){
            $v->stampaj();
        }
    }
    }

    echo "Najblizi proseku je: ";
    echo  najbliziProseku($video);
