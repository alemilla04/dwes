<?php
require_once('modelo.php');
session_name("Alexa");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Perfil</title>
</head>
<body>
    <?php include "./menu.php"; ?>
    <?php

    if(isset($_SESSION['usuarioObjeto'])){

        $usuario = $_SESSION['usuarioObjeto'];

        print "<div class='caja-perfil'>";   
        print "<table class='tab-perfil'>";
        print "<thead>";
        print "<tr>";
        print "<th>Foto</th>";
        print "<th>Nombre</th>";
        print "<th>Apellidos</th>";
        print "<th>Email</th>";
        print "</tr>";
        print "</thead>";
        print "<tbody>";
        print "<tr>";
        print "<td><img src='bbdd/$usuario->imagen' alt='foto perfil' width='100px'></td>";
        print "<td>$usuario->nombre</td>";
        print "<td>$usuario->apellidos</td>";
        print "<td>$usuario->email</td>";
        print "</tr>";
        print "</tbody>";
        print "</table>";
        print "</div>";   
    } else {
        echo "Necesitas estar logeado para mostrar el perfil";
    }
    ?>

    <?php include "footer.php"; ?>
</body>
</html>