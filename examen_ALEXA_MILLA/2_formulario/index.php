<?php
require_once(__DIR__.'/includes/funciones.php');
if(isset($_SESSION["borrarOk"])){
    $borrarOk = $_SESSION["borrarOk"];
}
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
    $lista_noticias = obtenerListaNoticias();
    if($lista_noticias!=null) {
        print("<h3>Total noticias: ".count($lista_noticias)."</h3>");
    } else {
        print("<p>Error al contar las noticias</p>");
    }
    ?>
       

        <div class="lista_noticias">
            <table class="conborde franjas">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $lista_noticias = obtenerListaNoticias();
                    if($lista_noticias!=null){
                        foreach ($lista_noticias as $noticia) {
                            print "<tr>";
                            print "<td>$noticia->titulo</td>";
                            print "<td>$noticia->autor</td>";
                            print "<td>$noticia->fecha</td>";
                            print "<td><a href='vernoticia.php?id=$noticia->id'>Ver </a> <a href='controlador/borrar.php?id=$noticia->id'>Borrar</a></th>";
                            print "</tr>";
                        }
                    } else {
                        print("<p>Error al mostrar las noticias</p>");
                    }
                   ?>
                </tbody>
            </table>
        </div>
<?php
    if(isset($borrarOk)){
        print("<p>Noticia borrada correctamente</p>");            
    }
    unset($_SESSION["borrarOk"]);
?>
    </main>

    <!-- BEGIN FOOTER -->
    <?php
    require_once(__DIR__.'/includes/footer.php');
    ?>

</body>

</html>