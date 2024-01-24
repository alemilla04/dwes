<?php 
require_once("funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    $nombreOK = true;
    $apellidosOK = true;
}
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
        cabecera("Insertar", MENU_VOLVER);
    ?>

    <main>
        <?php
            if(!$nombreOK) {
                print "<p class=\"aviso\">Error en el nombre.</p>\n";
            }
            if(!$apellidosOK) {
                print "<p class=\"aviso\">Error en los apellidos.</p>\n";
            }

            if($nombreOK && $apellidosOK) {
                $pdo = conectarDb();
                $consulta = "INSERT INTO $cfg[nombretabla] (nombre, apellidos) VALUES (:nombre, :apellidos)";

                $resultado = $pdo->prepare($consulta);

                if(!$resultado) {
                    print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                } elseif(!$resultado->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos])){
                    print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                } else {
                    print "<p>Registro insertado correctamente.</p>\n";
                    $pdo = null;
                }
            }
        ?>
    </main>

    <?php 
    pie();
    ?>
</body>
</html>