<?php
    class Circulo {
        public $radio, $centrox, $centro, $lado;
        public function __construct($r, $cx, $cy, $l){
            $this->radio = $r;
            $this->centrox = $cx;
            $this->centroy = $cy;
            $this->lado = $l;
        }
        private function dib(){
            $img = imagecreate($this->lado, $this->lado);
            $negro = imagecolorallocate($img, 0, 0, 0);
            $blanco = imagecolorallocate($img, 255, 255, 255);
            $rojo = imagecolorallocate($img, 255, 0, 0);
            //imagestring($im, 1, 5, 5,  "A Simple Text String", $color_texto);
            imagefilledrectangle($img, 0, 0, $this->lado, $this->lado, $blanco);
            imageellipse($img, $this->centrox, $this->centroy, $this->radio*2, $this->radio*2, $negro);
        }
        public function dibujar(){
            $this->dib();
            imagepng($img);
            imagedestroy($img);
        }
        public function dibujarFraccionPropia($frac){
            if($frac->espropia()){
                $this->dib();
                // Aqui falta iluminar numerador partes

                // Aqui falta dibujar las divisiomes
                imagepng($img);
                imagedestroy($img);
            }
        }
    }
?>