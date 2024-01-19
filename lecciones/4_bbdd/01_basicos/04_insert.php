<?php
require_once ("funciones.php");

$pdo = conectarDb();

$nombre = "Pepito";
$apellidos = "Conejo";
$edad = 69;

//consulta preparada usando dos puntos ":" antes de la variable
$consulta = "INSERT INTO personas(nombre, apellidos, edad)
            VALUES (:nombre, :apellidos, :edad)";

$resultado = $pdo->prepare($consulta);

if(!$resultado) {
    print "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, "apellidos" => $apellidos, "edad" => intval($edad)])){
    print "<p>Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Registro creado correctamente.</p>\n";
}