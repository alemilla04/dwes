<?php

function saludar($nombre = "usuario"){
    return "Hola $nombre";
}

function sumar($a, $b){
    return $a+$b;
}

function ecuacion_grado_2($a, $b, $c){
    $operacion1 = $b*-1;
    $operacion2 = sqrt(pow($b, 2)-4*$a*$c);
    $operacion3 = 2*$a;

    $ecuacion1 = ($operacion1+$operacion2)/$operacion3;
    $ecuacion2 = ($operacion1-$operacion2)/$operacion3;

    // if($operacion2 > 0){
    //     return false;
    // }

    $soluciones = [];

    array_push($soluciones, $ecuacion1, $ecuacion2);

    return $soluciones;

}