<?php
require_once("funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $listaids = recogeLista("listaids");
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
        cabecera("Borrar", MENU_VOLVER);
    ?>

    <main>
        <?php
            $pdo = conectarDb();

            $consulta = "DELETE FROM $cfg[nombretabla] WHERE id = :id";

            $resultado = $pdo->prepare($consulta);
            foreach($listaids as $id => $valor){
                if(!$resultado) {
                    print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                } elseif(!$resultado->execute([":id"=>$id])){
                    print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                } else {
                    print "<p>Registro borrado correctamente.</p>\n";
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
