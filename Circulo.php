<?php
    class Circulo {
        public $radio, $centrox, $centroy, $lado;
        public $img, $rojo, $negro;
        public function __construct($r, $cx, $cy, $l){
            $this->radio = $r;
            $this->centrox = $cx;
            $this->centroy = $cy;
            $this->lado = $l;
            $this->img = imagecreate($this->lado, $this->lado);
            $this->rojo = imagecolorallocate($this->img, 255, 0, 0);
            $this->negro = imagecolorallocate($this->img, 0, 0, 0);
        }
        private function dib(){
            $blanco = imagecolorallocate($this->img, 255, 255, 255);
            //imagestring($im, 1, 5, 5,  "A Simple Text String", $color_texto);
            imagefilledrectangle($this->img, 0, 0, $this->lado, $this->lado, $blanco);
            imageellipse($this->img, $this->centrox, $this->centroy, $this->radio*2, $this->radio*2, $this->negro);
        }
        private function exhibir(){
            imagepng($this->img);
            imagedestroy($this->img);
        }
        public function dibujar(){
            $this->dib();
            $this->exhibir();
        }
        public function dibujarFraccionPropia($frac){
            if($frac->espropia()){
                $this->dib();
                // Aqui se iluminan numerador partes
/*
imagefilledarc(
    resource $image,
    int $cx,
    int $cy,
    int $width,
    int $height,
    int $start,
    int $end,
    int $color,
    int $style
): bool
*/
                $ang_ini_grados = 0;
                $ang_rebanada = round(360 / $frac->denominador);
                for($i=0; $i<$frac->numerador; $i++){
                    imagefilledarc($this->img, $this->centrox, $this->centroy, $this->lado, 
                                   $this->lado, $ang_ini_grados, $ang_ini_grados+$ang_rebanada,
                                   $this->rojo, IMG_ARC_PIE);
                    $ang_ini_grados =  $ang_ini_grados + $ang_rebanada;                
                }
/*
imageline(
    resource $image,
    int $x1,
    int $y1,
    int $x2,
    int $y2,
    int $color
): bool
*/
                // Aqui se dibujan las divisiones
                $ang_ini_radianes = 0;
                $ang_rebanada_rad = 2 * M_PI / $frac->denominador;
                for($i=0; $i<$frac->denominador; $i++){
                    $x = $this->centrox + round($this->radio * cos($ang_ini_radianes));
                    $y = $this->centroy + round($this->radio * sin($ang_ini_radianes));
                    imageline($this->img, $this->centrox, $this->centroy, $x, $y, $this->negro);
                    $ang_ini_radianes = $ang_ini_radianes + $ang_rebanada_rad; 
                }
                
                $this->exhibir();
            }
        }
    }
?>