<?php
    if(isset($_POST["valorSecreto"])){
        $valorsecreto = $_POST["valorSecreto"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario5</title>
</head>
<body>
    <header>
        <h1>Formulario5</h1>
        <h2>Preservar valores entre llamadas POST</h2>
    </header>

    <main>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["submit"] == "secreto"){
                $valorsecreto = $_POST["secreto"];
            }
        }

        if (isset($valorsecreto)){
            print "<p>Valor secreto: $valorsecreto </p>";
        } else {
            print "<p>Valor secreto: SIN ASIGNAR </p>";
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>Valor secreto: <input type="text" name="secreto"></p>
            <p>
                <button type="submit" name="submit" value="secreto">Enviar valor</button> 
                <button type="submit" name="submit" value="otracosa">Hacer otra cosa</button> 
                <?php
                if (isset($valorsecreto)){
                    print "<input type='hidden' name='valorSecreto' value='" . $valorsecreto . "'>";
                }
                ?>
            </p>
        </form>
    </main>
    <footer>
        <hr>
        <p>Autor: Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>