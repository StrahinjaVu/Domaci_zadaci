<?php

require_once "student.php";
require_once "samofinansirajuci.php";

class Budzetski extends Student{

    //KONSTRUKTOR
    public function __construct($i, $espb, $p){
            parent::__construct($i, $espb, $p);
        }

    public function skolarina($espb){
        return (300 - $this->osvojeniESPB) * 200;
    }

    public function prijavaIspita(){
        return 100;
    }
}