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
    $fecha = recoge("fecha");
    $OK = true;
    if (is_null($nombre)) {
      $nombreERROR = "Falta el nombre";
      $OK = false;
    }
    if (is_null($fecha)) {
      $fechaERROR = "Falta la fecha";
      $OK = false;
    }

    if ($OK) {
      $fecha_hoy = new DateTime("now");
      $fecha_nac = new DateTime($fecha);
      $diff = $fecha_hoy -> diff($fecha_nac);
      $edad = $diff->y;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>F02_Calcular Edad</title>
</head>
<body>
    <header>
        <h1>F02_Calcular Edad</h1>
    </header>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Fecha: <input type="date" name="fecha"></p>
            <p>
                <button type="submit" name="button" value="boton1">Mostrar edad aqui</button>
                <button type="submit" name="button" value="boton2">Ir a recibe_datos.php</button>
            </p>
        </form>
        <?php
           if(isset($OK)){
            
            if($OK == false){

              if(isset($nombreERROR)){
                print "<p class='error'>$nombreERROR</p>";
              }
              if(isset($fechaERROR)){
                print "<p class='error'>$fechaERROR</p>";
              }
            }
            else{

              if($_POST["button"] == "boton1"){
                print "<div class='salida'>Hola $nombre</div>";
                print "<div class='salida'>Tienes $edad años</div>";
              }
              if($_POST["button"] == "boton2"){
                header("Location: recibe_datos.php?nombre=" . $nombre . "&edad" . $edad);
              }
            }
           }
        ?>
    </main>

    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>