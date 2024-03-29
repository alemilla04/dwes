<?php
session_start();
require_once(__DIR__."/includes/funciones.php");

if(isset($_SESSION["listaPersonas"])) {
    $listaPersonas = $_SESSION["listaPersonas"];
    unset($_SESSION["listaPersonas"]);
} else { 
    $_SESSION["listar"] = true;
    header("Location: ./backend/bbdd-show-3.php");
    exit();
}

if(isset($_SESSION["errorBBDD"])) {
    $errorBBDD = $_SESSION["errorBBDD"];
}

if(isset($_SESSION["modificarOK"])) {
    $modificarOK = $_SESSION["modificarOK"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD Personas</title>
</head>

<body>

    <?php
    cabecera("Modificar", MENU_PRINCIPAL);
    ?>

    <main>
        <form action="backend/bbdd-obtener-id.php" method="post">
            <p>Listado completo de registros:</p>
            <table class="conborde franjas">
            <thead>
                <tr>
                    <th>Modificar</th>
                    <th>Nombre</th>
                    <th>apellidos</th>
                </tr>
            </thead>
            <tbody class="franjas">
                <?php
                foreach($listaPersonas as $persona){
                    print "<tr>\n";
                    print "<td class='centrado'><input type='radio' name='id' value='$persona[id]'></td>\n";
                    print "<td>$persona[nombre]</td>\n";
                    print "<td>$persona[apellidos]</td>\n";
                    print "</tr>\n";
                }
                ?>
            </tbody>
        </table>
        <p></p>
        <input type="submit" value="Actualizar registro">
        <input type="submit" value="Reiniciar formulario">
        </form>
        <?php
            if(isset($errorBBDD)) {
                print "<p class='error'>$errorBBDD</p>";
            }

            if(isset($modificarOK) and $modificarOK == true) {
                print "<p class='exito fade-in-out'>Registro modificado correctamente.</p>";
            }

            unset($_SESSION['modificarOK']);
            unset($_SESSION['errorBBDD']);
        ?>
    </main>
    <?php
        pie();
    ?>
</body>
</html>