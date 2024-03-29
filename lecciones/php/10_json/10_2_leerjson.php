<?php

$file = 'bbdd/profesores.json';
$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
$profesores = json_decode($jsonData); //leo como objeto los json

print("<h3>Listados de profesores</h3>");
foreach ($profesores as $profesor){
    print ("Nombre: $profesor->nombre <br>");
    print ("Email: $profesor->email <br>");
    print ("Edad: $profesor->edad <br>");
    print ("Salario: $profesor->salario <br>");
    print ("Dirección: {$profesor->direccion->calle} nº{$profesor->direccion->numero} {$profesor->direccion->ciudad} <br>");
    print ("Materias: <br>");
    print ("<ul>");
    foreach($profesor->materias as $materia) {
        print("<li> $materia</li>");
    }
    print("</ul>");
    print("<hr>");
}

profesores_salario($profesores, 2000);

function profesores_salario($datos, $salariomin){
    print("<h3>Profesores que cobran más de $salariomin €</h3>");

    foreach($datos as $profesor){
        if($profesor -> salario >= $salariomin){
            print("- {$profesor -> nombre} {$profesor -> salario} € <br>");
        }
    }
}
