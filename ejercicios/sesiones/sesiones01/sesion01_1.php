<?php
session_start();

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
    <h1>Formulario palabras en mayúscula y minúscula (formulario) </h1>
    <main>
        <form action="sesion01_2.php" method="post">
            <p>Escriba una palabra en mayúsula y otra en minúscula: </p>
            <p>Mayúsculas:
                <input type="text" name="mayus" id="mayus" value="<?php echo !empty($_SESSION['mayus']) ? $_SESSION['mayus'] : ''; ?>">
            </p>
            <?php
            if(isset($_SESSION['mayusError'])){
                print "<p class='error'>$_SESSION[mayusError]</p>";
            } elseif(isset($_SESSION['mayus'])){
                print "<p>La palabra en mayúscula es: <strong>$_SESSION[mayus].</strong></p>";
            }
            ?>
            <p>
            Minúsculas:
            <input type="text" name="minus" id="minus" value="<?php echo !empty($_SESSION['minus']) ? $_SESSION['minus'] : ''; ?>">
            </p>
            <?php
            if(isset($_SESSION['minusError'])){
                print "<p class='error'>$_SESSION[minusError]</p>";
            } elseif(isset($_SESSION['minus'])){
                print "<p>La palabra en minúscula es: <strong>$_SESSION[minus].</strong></p>";
            }
            ?>
            <button type="submit" name="button" value="comprobar">Comprobar</button>
            <button type="submit" name="button" value="borrar">Borrar</button>
        </form>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>