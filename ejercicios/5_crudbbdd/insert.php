<?php
require_once("funciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        cabecera("Insertar", MENU_PRINCIPAL);
    ?>

    <main>
        <form action="insert-2.php" method='post'>
            <p>Escriba los datos del nuevo registro: </p>
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" size="50" autofocus></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos" size="50" autofocus></td>
                </tr>
            </table>

            <p>
                <input type="submit" value="Insertar">
                <input type="reset" value="Reiniciar formulario">
            </p>
        </form>
    </main>

    <?php 
    pie();
    ?>
</body>
</html>