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
    <?php include "menu.php"; ?>
    <main>
        <div class="login">
        <h3 class="h3-alta">Login</h3>
            <form action="comprobacion_login.php" method="post" enctype="multipart/form-data">
                <div class="datos">
                    <table>
                        <tr>
                            <td>Usuario:</td>
                            <td><input type="text" name="usuario"></td>
                        </tr>
                        <tr>
                            <td>Password:</td> 
                            <td><input type="password" name="password"></td>    
                        </tr>
                    </table>
                    <p></p>
                    <button type="submit" class="acceder" name="submit" value="acceder">Log in</button>
                    <p class="olvidar"><a href="login.html">Olvidé mi contraseña</a></p>
                </div>
            </form>
        </div>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>