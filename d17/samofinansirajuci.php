<?php

require_once "student.php";

class Samofinansirajuci extends Student{

    //KONSTRUKTOR
        public function __construct($i, $espb, $p){
            parent::__construct($i, $espb, $p);
        }
    
    public function skolarina($espb){
        if($this->prosecnaOcena < 8){
            return 1900 * $espb;
        }
        else{
            return 1600 * $espb;
        }
    }

    public function prijavaIspita(){
        return 400;
    }

    

}