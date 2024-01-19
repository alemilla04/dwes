<?php
require_once ("funciones.php");

$pdo = conectarDb();

$nombre = "Pepito";
$apellidos = "Conejo";
$edad = 69;

//consulta preparada usando dos puntos ":" antes de la variable
$consulta = "DELETE FROM personas WHERE nombre = :nombre AND apellidos = :apellidos";

$resultado = $pdo->prepare($consulta);

if(!$resultado) {
    print "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif (!$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos])){
    print "<p>Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "<p>Registro borrado correctamente.</p>\n";
}