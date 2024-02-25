<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
if(isset($_SESSION["loginError"])){
    $loginError = $_SESSION["loginError"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        cabecera();
    ?>
    <main>
        <div>
            <form action="backend/loginC.php" method="POST">
                <h1>Login</h1>
                <table>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="text" name="loginUsuario"></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="loginPassword"></td>
                    </tr>
                </table>
                <input type="submit" value="Ingresar" name="b-login" class="boton">
                <?php
                if(isset($loginError)){
                    print("<p>$loginError</p>");
                }

                unset($_SESSION["loginError"]);
                ?>
            </form>
        </div>
    </main>
    <?php
        footer();
    ?>
</body>
</html>