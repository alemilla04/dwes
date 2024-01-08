<?php

$lista_personas = [];

$persona = array(
    "nombre" => "Juan",
    "email" => "juan@test.com",
    "telefono" => "600111111"
);

array_push($lista_personas, $persona);

$json_lista_personas = json_encode($lista_personas, JSON_PRETTY_PRINT);//CODIFICA EL ARCHIVO A JSON

print "<pre>";
print_r($json_lista_personas);
print "<hr>";
print "</pre>";

//Vamos a trasladar este json de la lista de personas a disco
$file = 'bbdd/datos2.json'; //la carpeta bbdd debe existir
file_put_contents($file, $json_lista_personas);

//########### METEMOS UN SEGUNDO ELEMENTO
//CARGAMOS TODOS LOS DATOS DEL ARCHIVO

$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);

//CREAMOS UN ARRAY CON LOS DATOS

$lista_personas = json_decode($jsonData);

//AÑADIMOS ELEMENTO AL ARRAY

$persona = array(
    "nombre" => "Alicia",
    "email" => "Alicia@test.com",
    "telefono" => "600222222"
);

array_push($lista_personas, $persona);

//CODIFICAMOS EL JSON Y LO PASAMOS A DISCO

$json_lista_personas = json_encode($lista_personas, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_lista_personas);
print "<hr>";
print "</pre>";

file_put_contents($file, $json_lista_personas);
