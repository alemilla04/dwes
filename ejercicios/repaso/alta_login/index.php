<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    cabecera();
    ?>
    <main>
        <?php
            if(isset($_SESSION["usuarioLogin"])){
                print("<p>Hola! Bienvenido, gracias por iniciar sesión</p>");
            }
        ?>
    </main>
    <?php
    footer();
    ?>
</body>
</html>