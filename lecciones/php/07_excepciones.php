<?php

function dividir($a, $b){
    if($b == 0){
        throw new Exception('ERROR: Division por cero');
    }
    return $a / $b;
}

try{
    $a = 4;
    $b = 3;
    $resultado = dividir($a, $b);
    print "$a dividido por $b es ". number_format($resultado,2)."<br>"; 
}catch(Exception $e){
    print "Exception capturada: " . $e->getMessage();
}

try{
    $a = 4;
    $b = 0;
    $resultado = dividir($a, $b);
    print "$a dividido por $b es $resultado"."<br>"; 
}catch(Exception $e){
    print "Exception capturada: " . $e->getMessage();
}