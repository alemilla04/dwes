<?php
require_once('funciones/utilidades.php');

$dado1 = rand(1,6);
$dado2 = rand(1,6);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" title="Color">
    <title>Sumar dados</title>
</head>
<body>
    <header>
        <h1>SUMA DE DOS DADOS</h1>
    </header>
    <main>
        <?php
        print "<p><img src='img/". $dado1 . ".svg' alt = 'Dado' width='140' height='140'></p>\n";
        print "<p><img src='img/". $dado2 . ".svg' alt = 'Dado' width='140' height='140'></p>\n";

        print "La suma de los dos dados es: " . sumar($dado1, $dado2);
        ?>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>