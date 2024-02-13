<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
// print_r($_SESSION);
if(isset($_SESSION["persona"])){
    $persona = $_SESSION["persona"];
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
    cabecera("MODIFICAR-2", MENU_PRINCIPAL);
    ?>
    <main>
        <form action="controlador/modificarC.php" method="POST">
        <table>
                <tr>
                    <td>Nombre: </td>
                    <td>
                    <?php
                    print "<input type='text' name='nombre' value='$persona->nombre'>\n";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Apellidos: </td>
                    <td>
                    <?php
                    print "<input type='text' name='apellidos' value='$persona->apellidos'>\n";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        print "<input type='hidden' name='id' value='$persona->id'>\n";
                        ?>
                    </td>
                </tr>
            </table>
            <p></p>
            <input type="submit" value="Actualizar">
            <input type="submit" value="Reiniciar formulario">
            
        </form>
    </main>
    <?php
    pie();
    ?>
</body>
</html>