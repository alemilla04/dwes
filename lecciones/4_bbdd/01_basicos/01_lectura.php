<?php
require_once "funciones.php";

$pdo = conectarDb();

$consulta = "SELECT * FROM personas";

$resultado = $pdo->query($consulta);

print "<h2>CONSULTA</h2>";
print "<h3>LECTURA DE TODOS LOS REGISTROS</h3>";

if(!$resultado) {
    print "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif ($resultado->rowCount() == 0) {
    print "<p> 0 registros encontrados</p>\n";
} else {
    print "<p>" . $resultado->rowCount() . "registros encontrados</p>";
    print "   <table>\n";
    print "      <thead>\n";
    print "          <tr>\n";
    print "             <th>ID</th>\n";
    print "             <th>Nombre</th>\n";
    print "             <th>Apellidos</th>\n";
    print "             <th>Edad</th>\n";
    print "          </tr>\n";
    print "      </thead>\n";

    // foreach($resultado as $registro) {
    //     print "<tr>\n";
    //     print " <td>$registro[id]</td>\n";
    //     print " <td>$registro[nombre]</td>\n";
    //     print " <td>$registro[apellidos]</td>\n";
    //     print " <td>$registro[edad]</td>\n";
    //     print "</tr>\n";
    // }

    while ($registro = $resultado->fetch()) {
        print "<tr>\n";
        print " <td>$registro[id]</td>\n";
        print " <td>$registro[nombre]</td>\n";
        print " <td>$registro[apellidos]</td>\n";
        print " <td>$registro[edad]</td>\n";
        print "</tr>\n";
    }

    print "   </table>\n";

    print "<hr>";
    print("<p>Listado de edades</p>");
    // //OJO, FETCH COLUMN OBTIENE DATO Y AVANZA A LA SIGUIENTE TUPLA
    print($resultado->fetchColumn(3) . "<br>");
    print($resultado->fetchColumn(3) . "<br>");
    print($resultado->fetchColumn(3) . "<br>");
}

$pdo = null;