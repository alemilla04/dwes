<?php
require_once('funciones/utilidades.php');

$a = rand(1,9);
$b = rand(1,9);
$c = rand(1,9);
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
        <h1>Calculadora de ecuaciones de segundo grado</h1>
    </header>
    <main>
        <?php
        $soluciones = ecuacion_grado_2(1, -5, 6);
        $contador = 1;
        if(is_bool($soluciones)){
            print "Error, no tiene solución.";
        }
        else{
            foreach($soluciones as $solucion){
                print "x".$contador."= $solucion" . "&nbsp";
                print "<br>";
                $contador++;
            }
        }
        ?>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>