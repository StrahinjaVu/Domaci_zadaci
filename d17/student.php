<?php

abstract class Student{
    protected $ime;
    protected $osvojeniESPB;
    protected $prosecnaOcena;

    public abstract function skolarina($espb);
    public abstract function prijavaIspita();

    //KONSTRUKTOR
    public function __construct($i, $espb, $p){
        $this->setIme($i);
        $this->setOsvojeniESPB($espb);
        $this->setProsecnaOcena($p);
    }

    //SETERI
    public function setIme($ime){
        if(is_string($ime)){
            $this->ime = $ime;
        }
        else{
            $this->ime = "";
        }
        
    }

    public function setOsvojeniESPB($espb){
        $this->osvojeniESPB = $espb;
    }

    public function setProsecnaOcena($p){
        $this->prosecnaOcena = $p;
    }

    //GETERI
    public function getIme(){
        return $this->ime;
    }

    public function getOsvojeniESPB(){
        return $this->osvojeniESPB;
    }

    public function getProsecnaOcena(){
        return $this->prosecnaOcena;
    }

    public function ispis(){
        echo "<p>{$this->getIme()} sa osvojenim {$this->getOsvojeniESPB()} poena ima prosek {$this->getProsecnaOcena()}</p>";
    }

}