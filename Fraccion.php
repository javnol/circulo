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
        // Devuelve true si la fracción es propia
        public function espropia(){
            // https://economipedia.com/definiciones/fracciones-propias.html
            // Las fracciones propias son aquellas que tienen un numerador que es menor que el denominador. 
            // Es decir, el número en la parte superior es menor que el número de la parte inferior
            if( $this->numerador < $this->denominador ) return true;
            else return false;
        }
    }
?>