<?php
    header("Content-Type: image/png");
    require_once("Fraccion.php");
    $frac = new Fraccion(2, 19);
    // echo "La fracción es:";
    // $frac->exhibir();
    require_once("Circulo.php");
    $radio=200;
    $cx=200; 
    $cy=200;
    $lado=400;
    $cir = new Circulo($radio, $cx, $cy, $lado);
    //$cir->dibujar();
    $cir->dibujarFraccionPropia($frac);
?>