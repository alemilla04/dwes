<?php

$entero = 4;
$numero = 4.5;
$cadena = "cadena";
$bool = True;

//Cambio de tipo de una variable
$a = 5;
echo gettype($a);
echo "<br>";
$a = "Hola";
echo gettype($a);
print "<hr>";

//CONSTANTES
//Al imprimir una constante no se usa el dolar
define("LIMITE", 1000);
$suma = 1 + LIMITE;
print $suma;

// TIPO NUMERICOS

print "<hr>";
$a = 0b100; //4 en binario
print $a . "<br>";

$a = 0b100; //64 en octal
print $a . "<br>";

//ASIGNACION POR REFERENCIA
print "<hr>";
$var1 = 100;
$var2 = &var1;
$var3 = $var1;
echo "$var2<br>";
$var2 = 300;
echo "$var1<br>";
$var3 = 400;
echo "$var3;