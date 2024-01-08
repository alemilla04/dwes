<?php
session_start();

if(!isset($_SESSION['numero'])){
    $_SESSION['numero'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <h1>subir y bajar número</h1> 
    <main>
        <form action="sesion02_2.php" method="post">
            <p>Haga click en los botones para modificar el valor:</p>
            <button type="submit" name="accion" value="menos" style="font-size: 4rem">-</button>
            <?php
                // Mostramos el número, guardado en la sesión
                print "<span style='font-size: 4rem'>$_SESSION[numero]</span>";
            ?>
            <button type="submit" name="accion" value="mas" style="font-size: 4rem">+</button>
            <p></p>
            <button type="submit" name="accion" value="borrar" style="font-size: 1.2rem">Poner a cero</button>
            
        </form>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>