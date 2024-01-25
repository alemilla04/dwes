<?php
require_once("funciones.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
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
        cabecera("Buscar 2", MENU_VOLVER);
    ?>
    <main>
        <?php
            $pdo = conectarDb();
            $consulta = "SELECT * FROM $cfg[nombretabla] WHERE nombre = :nombre AND apellidos = :apellidos";
            $resultado = $pdo->prepare($consulta);

            if(!$resultado) {
                print "<p class=\"aviso\">Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif(!$resultado->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos])){
                print "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                print "    <p>Listado completo de registros:</p>\n";
                print "\n";
                print "    <table class=\"conborde franjas\">\n";
                print "      <thead>\n";
                print "        <tr>\n";
                print "          <th>Nombre</th>\n";
                print "          <th>Apellidos</th>\n";
                print "        </tr>\n";
                print "      </thead>\n";
                foreach($resultado as $registro) {
                    print "      <tr>\n";
                    print "        <td>$registro[nombre]</td>\n";
                    print "        <td>$registro[apellidos]</td>\n";
                    print "      </tr>\n";
                }
                print "</table>";
            }
        ?>
    </main>
    <?php
        pie();
    ?>
</body>
</html>