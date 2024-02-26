<?php
session_start();
// print("<pre>");
// print_r($_POST);
// print("</pre>");

if(isset($_SESSION["errorTitulo"])){
    $errorTitulo = $_SESSION["errorTitulo"];
}

if(isset($_SESSION["errorCuerpo"])){
    $errorCuerpo = $_SESSION["errorCuerpo"];
}

if(isset($_SESSION["errorAutor"])){
    $errorAutor = $_SESSION["errorAutor"];
}

if(isset($_SESSION["errorFecha"])){
    $errorFecha = $_SESSION["errorFecha"];
}

if(isset($_SESSION["datosOk"])){
    $datosOk = $_SESSION["datosOk"];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" title="Color">
    <title>Nueva Noticia</title>
</head>

<body>
<?php
    require_once(__DIR__.'/includes/header.php');
    require_once(__DIR__.'/includes/menu.php');
    ?>

    <main>

        <div class="box_nuevanoticia">
            <form action="controlador/procesar_alta.php" method="post">

                <div>
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" value="">
                </div>

                <div>
                    <label for="cuerpo">Cuerpo:</label>

                    <textarea name="cuerpo" rows="5">XXXXX</textarea>
                </div>

                <div>
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" value="">
                </div>

                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" value="">
                </div>

                <br>
                <div class="categorias">
                    <div><input type="radio" name="categoria" value="sucesos">Sucesos</div>
                    <div><input type="radio" name="categoria" value="deportes" checked>Deportes</div>
                    <div><input type="radio" name="categoria" value="corazon">Corazón</div>
                </div>


                <div class="centrado">
                    <button type="submit" name="crear_noticias" value="">Crear noticia</button>
                </div>
            <?php
                if(isset($errorTitulo)){
                    print("<p>$errorTitulo</p>");
                }
                if(isset($errorCuerpo)){
                    print("<p>$errorCuerpo</p>");
                }
                if(isset($errorAutor)){
                    print("<p>$errorAutor</p>");
                }
                if(isset($errorFecha)){
                    print("<p>$errorFecha</p>");
                }
                if(isset($datosOk) && $datosOk){
                    print("<p>Noticia añadida correctamente</p>");
                }
                unset($_SESSION["errorTitulo"]);
                unset($_SESSION["errorCuerpo"]);
                unset($_SESSION["errorAutor"]);
                unset($_SESSION["errorFecha"]);
                unset($_SESSION["datosOk"]);
            ?>


            </form>
        </div>



    </main>
    <!-- BEGIN footer.php  -->
    <?php
    require_once(__DIR__.'/includes/footer.php');
    ?>
</body>

</html>