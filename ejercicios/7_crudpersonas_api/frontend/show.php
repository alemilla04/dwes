<?php
session_start();
require_once(__DIR__ . "/includes/funciones.php");

// if(isset($_SESSION["listaPersonas"])) {
//     $listaPersonas = $_SESSION["listaPersonas"];
//     unset($_SESSION["listaPersonas"]);
// } else { 
//     $_SESSION["listar"] = true;
//     header("Location: ./backend/bbdd-show.php");
//     exit();
// }

//CON FILE_GET_CONTENTS

// $listaPersonas = json_decode(file_get_contents("http://127.0.0.1:8000/personas"));

////CON CURL
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, "http://127.0.0.1:8000/personas");
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$listaPersonas = json_decode(curl_exec($curlHandle));
curl_close($curlHandle);

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
    cabecera("Listar", MENU_PRINCIPAL);
    ?>

    <main>
        <p>Listado completo de registros:</p>
        <table class="conborde franjas">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>apellidos</th>
                </tr>
            </thead>
            <tbody class="franjas">
                <?php
                foreach($listaPersonas as $persona){
                    print "<tr>\n";
                    print "<td>$persona->nombre</td>\n";
                    print "<td>$persona->apellidos</td>\n";
                    print "</tr>\n";
                }
                ?>
            </tbody>
        </table>
    </main>
    <?php
        pie();
    ?>
</body>
</html>