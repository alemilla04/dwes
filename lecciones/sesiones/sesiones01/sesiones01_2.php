<?php
session_name("sesion_datosalexa");
session_start();

print "<pre>";
print_r($_SESSION);
print "</pre>";

$nombre = $_SESSION["nombre"];
$lista = $_SESSION["lista"];
$usuario = $_SESSION["usuario"];

print "<h1> Sesiones01_2</h1>";

print "<strong>Elementos de la lista</strong><br>";
foreach ($lista as $key => $valor){
    print "$key ---> $valor <br>";
}

print "<br>";

print "<strong>Elementos del usuario</strong><br>";
foreach ($usuario as $key => $valor){
    print "$key ---> $valor <br>";
}

print "El email solo es -->" . $_SESSION["usuario"]["email"] . "<br>";

print "<p>El nombre es $nombre</p>";
print "<p>El primer elemento de la lista es --> $lista[0]</p>";


print "<p><a href='sesiones01_1.php'>Volver a sesiones01_1.php</a></p>";


