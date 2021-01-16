<?php

class Knjiga{
    private $naslov;
    private $autor;
    private $godIzdanja;
    private $brojStrana;
    private $cena;

    //KONSTRUKTOR
    public function __construct($n, $a, $g, $s, $c){
        $this->setNaslov($n);
        $this->setAutor($a);
        $this->setGodinaIzdanja($g);
        $this->setBrojStrana($s);
        $this->setCena($c);

    }

    //SETERI
    public function setNaslov($n){
        $this->naslov = $n;
    }

    public function setAutor($a){
        $this->autor = $a;
    }

    public function setGodinaIzdanja($g){
        $this->godIzdanja = $g;
    }

    public function setBrojStrana($s){
            return $this->brojStrana = $s;
    }

    public function setCena($c){
        return $this->cena = $c;
    }

    //GETERI
    public function getNaslov(){
        return $this->naslov;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getGodinaIzdanja(){
        return $this->godIzdanja;
    }

    public function getBrojStrana(){
        return $this->brojStrana;
    }

    public function getCena(){
        return $this->cena;
    }
    // kraj get i set


    public function stampaj(){
        echo "<p>Naslov:$this->naslov &nbsp Autor:$this->autor &nbsp Godina Izdanja: $this->godIzdanja &nbsp Broj strana: $this->brojStrana &nbsp Cena:$this->cena</p>";
    }

    public function obimna(){
        if($this->brojStrana >= 600){
            return true;
        }else{
            return false;
        }
    }

    public function skupa(){
        if($this->cena >= 8000){
            return true;
        }else{
            return false;
        }
    }

    public function dugackoIme(){
        if(strlen($this->autor) > 18){
            return true;
        }else{
            return false;
        }
    }
}

$knjiga = new Knjiga("Hari Poter", "J.K.Rouling", 2001, 450, 8000);
$knjiga->stampaj();

//ISPITIVANJA
if($knjiga->obimna()){
    echo "<p>Knjiga je obimna</p>";
}else{
    echo "<p>Knjiga nije obimna</p>";
}
if($knjiga->skupa()){
    echo "<p>Knjiga je skupa</p>";
}else{
    echo "<p>Knjiga nije skupa</p>";
}
if($knjiga->dugackoIme()){
    echo "<p>Ime je dugacko</p>";
}else{
    echo "<p>Ime nije dugacko</p>";
}

?>