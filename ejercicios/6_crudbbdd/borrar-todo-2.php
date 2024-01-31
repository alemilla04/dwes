<?php
require_once("funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $borrar = recoge("borrar");
}

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
       <?php
            if($borrar != "Si") {
                header("Location: ./index.php");
                exit;
            }

            $pdo = conectarDb();
            if($pdo != null) {
                borraTodo();
            } else {
                print("<p>Error en la conexion a la bbdd</p>");
            }
        ?>
    </main>

    <?php
    pie();
    ?>
</body>
</html>