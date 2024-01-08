<?php
session_name("Alexa");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1 class="h1-login">Login</h1>
    </header>
    <main>
        <div class="login">
            <form action="comprobacion_login.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" name="usuario"></td>
                    </tr>
                    <tr>
                        <td>Password:</td> 
                        <td><input type="text" name="password"></td>    
                    </tr>
                </table>
                <p></p>
                <button type="submit" class="acceder" name="submit" value="acceder">Acceder</button>
                <p class="olvidar"><a href="login.html">Olvidé mi contraseña</a></p>
                <p class="volver_alta"><a href="alta.php">Volver al registro</a></p>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <p>© Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>