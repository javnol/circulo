<?php
    class Fraccion {
        public $numerador, $denominador;
        public function __construct($n, $d){
            $this->numerador = $n;
            $this->denominador = $d;
        }
        public function exhibir(){
            echo $this->numerador . "/" . $this->denominador;
        }
    }
?>