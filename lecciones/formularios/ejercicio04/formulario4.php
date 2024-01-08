<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Formulario 4</title>
</head>
<body>
    <header>
        <h1>Formulario 4</h1>
        <h2>Saber que botón he pulsado</h2>
    </header>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Edad: <input type="text" name="edad"></p>
            <p>
                <button type="submit" name="button" value="valor1">Boton valor1</button>
                <button type="submit" name="button" value="valor2">Boton valor2</button>
                <input type="submit" name="button" value="valor3">
            </p>
            <p>
        </form>
        <?php
        // if(isset($_POST["boton"]))
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            print "<pre>";
            print "Matriz \$_POST" . "<br>";
            print_r($_POST);
            print "</pre>\n";

            if ($_POST["button"] == "valor1") {
                print "<p>He pulsado <strong> Boton valor 1</strong></p>";
            }

            if ($_POST["button"] == "valor2") {
                print "<p>He pulsado <strong> Boton valor 2</strong></p>";
            }

            if ($_POST["button"] == "valor3") {
                print "<p>He pulsado <strong> Boton valor 3</strong></p>";
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