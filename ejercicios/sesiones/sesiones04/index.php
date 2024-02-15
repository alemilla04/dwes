<?php

require_once('modelo.php');

session_name("Alexa");
session_start();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Principal</title>
</head>

<body>
    <?php include "menu.php"; ?>

    <main>
    <?php

    $lista_usuarios = [];
    $file = 'data.json';

    $jsonData = file_get_contents("./bbdd/{$file}");
    $lista_usuarios = json_decode($jsonData);

    echo '<h2> Total de usuarios de alta: ' . count($lista_usuarios) . '</h2>';

    if(isset($_COOKIE["Ultimo_usuario"]) && isset($_COOKIE["Ultimo_usuario_fecha"])){
        $ultimo_usuario = $_COOKIE["Ultimo_usuario"];
        $ultimo_usuario_fecha = $_COOKIE["Ultimo_usuario_fecha"];

        echo "<p>Último usuario: <strong>" . $ultimo_usuario . "</strong><br>Última fecha de alta: <strong>". $ultimo_usuario_fecha ."</strong></p>";
    }
    ?>


    </main>

    <?php include "footer.php"; ?>

</body>

</html>