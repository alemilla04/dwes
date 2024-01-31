<?php
    require_once("funciones.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // print("<pre>");
        // print_r($_POST);
        // print("</pre>");
        $id = recoge("id");
        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");
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
        cabecera("MODIFICAR 3", MENU_VOLVER);
    ?>
    <main>
        <?php
        $pdo = conectarDb();

        $consulta = "UPDATE $cfg[nombretabla] SET nombre = :nombre, apellidos = :apellidos WHERE id = :id";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado) {
            print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } elseif(!$resultado->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos, ":id"=>$id])){
            print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        } else {
            print "<p>Registro actualizado correctamente.</p>\n";
            $pdo = null;
        }

        ?>
    </main>
    <?php
        pie();
    ?>
</body>
</html>
