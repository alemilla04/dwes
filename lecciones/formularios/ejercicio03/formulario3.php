<?php
require_once("../../util/utilidades.php");
// function recoge($var){
//     if(isset($_POST[$var])){
//         if($_POST[$var] != ""){
//             $tmp = trim(htmlspecialchars(strip_tags($_POST[$var])));
//             return $tmp;
//         }
//     }
//     return null;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {    //hemos pulsado

    $nombre = recoge("nombre");
    $edad = recoge("edad");
    $OK = true;
    if (is_null($nombre)) {
      $nombreERROR = "Falta el nombre";
      $OK = false;
    }
    if (is_null($edad)) {
      $edadERROR = "Falta la edad";
      $OK = false;
    } elseif (!is_numeric($edad)) {
      $edadERROR = "Edad debe ser un numero";
      $OK = false;
    }
    if ($OK) {
      header("Location: principal.php?nombre=" . $nombre . "&edad=" . $edad);
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Formulario 2</title>
</head>
<body>
    <header>
        <h1>Formulario 2</h1>
    </header>
    <main>
        <form action="formulario3.php" method="post">
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Edad: <input type="text" name="edad"></p>
            <p>
                <input type="submit" value="Enviar">
            </p>
        </form>
        <?php
           if (isset($nombreERROR)) {
                print "<p class='error'>$nombreERROR</p>";
            }
            if (isset($edadERROR)) {
                print "<p class='error'>$edadERROR</p>";
            }
        ?>
    </main>

    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>