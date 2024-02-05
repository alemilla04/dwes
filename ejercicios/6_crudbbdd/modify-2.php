<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
// print "<pre>";
// print_r($_SESSION["persona"]);
// print "</pre>";
if(isset($_SESSION["persona"])){
    $persona = $_SESSION["persona"];
}

if(isset($_SESSION["errorNombre"])) {
    $errorNombre = $_SESSION["errorNombre"];
}

if(isset($_SESSION["errorApellidos"])) {
    $errorApellidos = $_SESSION["errorApellidos"];
}

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
        cabecera("MODIFICAR 2", MENU_VOLVER);
    ?>
    <main>
        <form action="backend/bbdd-modify.php" method="POST">
            <p>Modifique los campos que desee:</p>
            <table>
                <tr>
                    <td>Nombre: </td>
                    <td>
                    <?php
                    print "<input type='text' name='nombre' value='$persona[nombre]'>\n";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Apellidos: </td>
                    <td>
                    <?php
                    print "<input type='text' name='apellidos' value='$persona[apellidos]'>\n";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        print "<input type='hidden' name='id' value='$persona[id]'>\n";
                        ?>
                    </td>
                </tr>
            </table>
            <p></p>
            <input type="submit" value="Actualizar">
            <input type="submit" value="Reiniciar formulario">
        </form>
        <?php
        if(isset($errorNombre)) {
            print "<p class='error'>$errorNombre</p>";
        }

        if(isset($errorApellidos)) {
            print "<p class='error'>$errorApellidos</p>";
        }
    
        unset($_SESSION['errorNombre']);
        unset($_SESSION['errorApellidos']);
        ?>
    </main>
    <?php
        pie();
    ?>
</body>
</html>
