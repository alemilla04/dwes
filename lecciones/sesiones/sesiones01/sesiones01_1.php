<?php
session_name("sesion_datosalexa"); //para limitar el uso de las sesiones teniendo que compartir el mismo nombre para ello.
session_start();

print "<h1>Sesiones01_1</h1>";

$_SESSION["nombre"] = "Pepito Conejo";
print "<p>El nombre es $_SESSION[nombre]</p>";


$productos = array("leche", "pan", "huevos");

$_SESSION["lista"] = $productos;

$usuario = array(
    "Nombre" => "Pepe",
    "email" => "pepe@kk.com",
    "edad" => 34
);

$_SESSION["usuario"] = $usuario;


print "<p><a href='sesiones01_2.php'>Ir a sesiones01_2.php</a></p>";