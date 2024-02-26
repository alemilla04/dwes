<?php
session_start();
require_once(__DIR__.'/includes/funciones.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Ejercicio1</title>
</head>

<body>

    <!--  header y menu -->
    <?php
    require_once(__DIR__.'/includes/header.php');
    require_once(__DIR__.'/includes/menu.php');
    ?>

    <main>
       <?php
       $id = $_GET["id"];
       $noticia = obtenerNoticia($id);
       
       if($noticia!=null){
           print "<h3>$noticia->titulo</h3>";
           print "<p>$noticia->cuerpo</p>";
           print "<p><strong>Autor: </strong>$noticia->autor</p>";
           print "<p><strong>Fecha: </strong>$noticia->fecha</p>";
           print "<p><strong>Categoria: </strong>$noticia->categoria</p>";
       } else{
        print "<p>error</p>";
       }

       ?>
       <br>
        <a href="index.php">Volver</a>
    </main>

    <!-- BEGIN FOOTER -->
    <?php
    require_once(__DIR__.'/includes/footer.php');
    ?>

</body>

</html>