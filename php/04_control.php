<?php

print '<hr>';
$a = 3;
$a = "3";

if($a == $b){
    echo "Son iguales (mismo valor) <br>";
} else {
    echo "No son iguales <br>";
}

if($a === $b){
    echo "Son idénticos (mismo tipo y valor) <br>";
} else {
    echo "No son idénticos <br>";
}

print "<hr>";
for ($i = 0; $i < 5 ; $i = $i + 1){
    echo "$i <br>";
}
print "<br>";

$matriz = [0, 1, 10, 100, 1000];
foreach ($matriz as $valor){
    print $valor."<br>\n";
}

print "<br>";

foreach ($matriz as $indice => $valor){
    print "$indice --> $valor <br>\n";
}
