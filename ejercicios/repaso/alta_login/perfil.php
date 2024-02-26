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
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
        cabecera();
    ?>
    <main>
        <?php
        if(isset($_SESSION["usuarioLogin"])){
            $usuario = $_SESSION["usuarioLogin"];
            print "<table>";
            print " <thead>";
            print "     <tr>";
            print "         <th>Foto</th>";
            print "         <th>Nombre</th>";
            print "         <th>Apellidos</th>";
            print "         <th>email</th>";
            print "     </tr>";
            print " </thead>";
            print " <tbody>";
            print "     <tr>";
            print "         <td><img src='bbdd/$usuario->imagen'></td>";
            print "         <td>$usuario->nombre</td>";
            print "         <td>$usuario->apellidos</td>";
            print "         <td>$usuario->email</td>";
            print "     </tr>";
            print " </tbody>";
            print "</table>";
        }
        ?>
        <img src="" alt="">
    </main>
    <?php
        footer();
    ?>
</body>
</html>