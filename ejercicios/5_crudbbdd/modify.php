<?php
require_once("funciones.php");
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
    cabecera("Borrar", MENU_PRINCIPAL);
    ?>

    <main>
        <?php
        $pdo = conectarDb();
        $consulta = "SELECT * FROM $cfg[nombretabla]";

        $resultado = $pdo->query($consulta);
        
        if (!$resultado) {
            print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } else {
            print "    <form action='modify-2.php' method='post'>\n";
            print "    <p>Listado completo de registros:</p>\n";
            print "\n";
            print "    <table class=\"conborde franjas\">\n";
            print "      <thead>\n";
            print "        <tr>\n";
            print "          <th>Borrar</th>\n";
            print "          <th>Nombre</th>\n";
            print "          <th>Apellidos</th>\n";
            print "        </tr>\n";
            print "      </thead>\n";
            foreach ($resultado as $registro) {
                print "      <tr>\n";
                print "        <td class='centrado'><input type='radio' name=\"id\" value='$registro[id]'></td>\n";
                print "        <td>$registro[nombre]</td>\n";
                print "        <td>$registro[apellidos]</td>\n";
                print "      </tr>\n";
            }
            print "    </table>\n";

            print "<p>\n";
            print "<input type=\"submit\" value=\"Modificar registro\">\n";
            print "<input type=\"submit\" value=\"Reiniciar formulario\">\n";
            print "</p>\n";
            print "    </form>\n";
        }
        ?>
    </main>
    <?php
        pie();
    ?>
</body>
</html>