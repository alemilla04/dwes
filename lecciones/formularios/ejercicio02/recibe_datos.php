<?php

// print "<pre>";
// print "Matriz \$_REQUEST"."<br>";
// print_r($_REQUEST);
// print "<pre>\n";

// print "<pre>";
// print "Matriz \$_GET"."<br>";
// print_r($_GET);
// print "<pre>\n";

// // vamos a usar el $_POST
// print "<pre>";
// print "Matriz \$_POST"."<br>";
// print_r($_POST);
// print "<pre>\n";

// print "<p><a href='formulario2.html'>Volver al formulario</a></p>";

print "<h2>Mostramos datos</h2>";

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$curso= $_POST["curso"];

print "Nombre: $nombre"."<br>";
print "Edad: $edad"."<br>";
print "Curso: $curso"."<br>";

print "<p><a href='formulario2.html'>Volver al formulario</a></p>";
