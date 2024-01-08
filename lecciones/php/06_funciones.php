<?php

$nombre1 = "Pedro";
$nombre2;
$apellidos = "Sanchez";

//Mostrar texto en negrita
//Funcion isset()
print "<p>Tu nombre es <strong>";
if(isset($nombre1)){
    print "$nombre1";
}

if(isset($nombre2)){
    print " $nombre2";
}

if(isset($apellidos)){
    print " $apellidos";
}

print "</strong></p>";

//Funcion is_null()
$sexo="M";
if(is_null($sexo)){
    print "El sexo no está definido";
} elseif($sexo == "M"){
    print "Sexo: MASCULINO";
} elseif($sexo == "F"){
    print "Sexo: FEMENINO";
}

print "<hr>";

//Comprobar el tipo de una variable
//is_int() o is_float o is_numeric()
$a = 4;
if(is_int($a)){
    print "La variable \$a es de tipo ENTERO";
}

print "<br>";

$dato = "48";
if(is_numeric($dato)){
    print "La edad es $dato";
} else{
    print "Valor de edad incorrecto";
}

print "<hr>";
//Definir funciones

function suma($a, $b){
    return $a+$b;
}

print suma(4,10)."<br>";

//----------------------------------------------
function saludar($nombre="usuario", $negrita=0){
    if($negrita==1){
        print "<p><strong>Hola $nombre</strong></p>";
    } else{
        print "<p>Hola $nombre</p>";
    }
}

saludar();
saludar("Juan");
saludar("Juan", 1);







