<?php
$numeros = [3,5,5,4,2,3,5];

$resultado = [];

$contador = 0;

foreach($numeros as $valor){
    for($i=0; $i<count($numeros); $i++){
        if($valor == $numeros[$i]){
            $contador++;
        }
    }    
    $resultado[$valor] = $contador;
    $contador = 0;
}

print '<pre>';print_r($resultado);print'</pre>';


