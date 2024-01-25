<?php
require_once("funciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        cabecera("Buscar 1", MENU_VOLVER);
    ?>
    <main>
        <form action="search-2.php" method="post">
            <p>Escriba el criterio de búsqueda (caracteres o números): </p>
            <table>
                <tr>
                    <td>
                        Nombre:
                        <input type="text" name="nombre">
                    </td>
                </tr>
                <tr>
                    <td>
                        Apellidos:
                        <input type="text" name="apellidos">
                    </td>
                </tr>
            </table>
            <p></p>
            <input type="submit" value="Buscar">
            <input type="submit" value="Reiniciar formulario">
        </form>
    </main>
    <?php
        pie();
    ?>
</body>
</html>