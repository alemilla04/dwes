<?php
 require_once("funciones.php");
    // print("<pre>");
    // print_r($_POST);
    // print("</pre>");
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = recoge("id");
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
        <form action="modify-3.php" method="POST">
            <p>Modifique los campos que desee:</p>
            <?php
            $pdo = conectarDb();
            $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id = :id";
            $resultado = $pdo->prepare($consulta);

            if (!$resultado) {
                print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif (!$resultado->execute([":id"=>$id])){
                print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n"; 
            } else {
                foreach($resultado as $registro){
                    print "<table>\n";
                    print "<tr>\n";
                    print "<td>Nombre:</td>\n";
                    print "<td>\n";
                    print "<input type='text' name='nombre' value='$registro[nombre]'>\n";
                    print "</td>\n";
                    print "</tr>";
                    print "<tr>";
                    print "<td>Apellidos: </td>\n";
                    print "<td>\n";
                    print "<input type='text' name='apellidos' value='$registro[apellidos]'>\n";
                    print "</td>\n";
                    print "</tr>\n";
                    print "<tr>\n";
                    print "<td>\n";
                    print "<input type='hidden' name='id' value='$registro[id]'>\n";
                    print "</td>\n";
                    print "</tr>\n";
                    print "</table>\n";
                }
                print "<p>\n";
                print "<input type='submit' value='Actualizar'>\n";
                print "<input type='submit' value='Reiniciar formulario'>\n";
                print "</p>\n";
                $pdo = null;
            }
        
            ?>
        </form>
    </main>
    <?php
        pie();
    ?>
</body>
</html>
