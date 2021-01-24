<?php

require_once "sportista.php";


class Kosarkas extends Sportista{
    private $poeni;

    //KONSTRUKTOR
    public function __construct($ime, $prezime, $godRodjenja, $gradRodjenja, $poeni){
        parent::__construct($ime, $prezime, $godRodjenja, $gradRodjenja);
        $this-setPoeni($poeni);
    }

    //SETERI
    public function setPoeni($poeni){
        $this->poeni = $poeni;
    }

    //GETERI
    public function getPoeni(){
        return $this->poeni;
    }
}