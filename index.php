<?php
    header("Content-Type: image/png");
    // require_once("Fraccion.php");
    // $frac = new Fraccion(10, 31);
    // echo "La fracción es:";
    // $frac->exhibir();
    require_once("Circulo.php");
    $cir = new Circulo(200, 200, 200, 400);
    $cir->dibujar();
?>