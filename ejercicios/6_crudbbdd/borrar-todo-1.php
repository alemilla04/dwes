<?php
require_once(__DIR__."../includes/funciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD - Borrar y crear</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        cabecera("Inicio", MENU_VOLVER);
    ?>
    <main>
        <form action="backend/bbdd-delete-all.php" method=post>
            <p>¿Está seguro?</p>
            <p>
                <input type="submit" name=borrar value="Si">
                <input type="submit" name=borrar value="No">
            </p>
        </form>
    </main>

    <?php
    pie();
    ?>
</body>
</html>