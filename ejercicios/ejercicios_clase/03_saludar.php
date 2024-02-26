<?php
require_once('funciones/utilidades.php')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" title="Color">
    <title>saludar</title>
</head>
<body>
    <header>
        <h1>Saludar con función</h1>
    </header>
    <main>
        <?php
        print"<p><strong>" . saludar("Juanico") . "</strong></p>";
        ?>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>