<?php
session_start();
require_once(__DIR__."/includes/funciones.php");

$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, "http://127.0.0.1:8000/personas");
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$listaPersonas = json_decode(curl_exec($curlHandle));
curl_close($curlHandle);
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
    cabecera("Borrar", MENU_PRINCIPAL);
    ?>    

    <main>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Listado completo de registros:</p>
            <table class="conborde franjas">
                <thead>
                    <tr>
                        <th>Borrar</th>
                        <th>Nombre</th>
                        <th>apellidos</th>
                    </tr>
                </thead>
            <tbody class="franjas">
                <?php
                foreach($listaPersonas as $persona) {
                    print "<tr>\n";
                    print "<td class='centrado'><input type='checkbox' name='listaids[$persona->id]'></td>\n";
                    print "<td>$persona->nombre</td>\n";
                    print "<td>$persona->apellidos</td>\n";
                    print "</tr>\n";
                }
                ?>
            </tbody>
            </table>
            <p></p>
            <input type="submit" value="Borrar registro">
            <input type="submit" value="Reiniciar formulario">
        </form>
    </main>
</body>
</html>