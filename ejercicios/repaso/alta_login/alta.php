<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
if(isset($_SESSION["emailError"])){
    $emailError = $_SESSION["emailError"];
}

if(isset($_SESSION["errorPass"])){
    $errorPass = $_SESSION["errorPass"];
}

if(isset($_SESSION["altaOK"])){
    $altaOK = $_SESSION["altaOK"];
}

print("<pre>");
print_r($_FILES);
print("</pre>");
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
            <form action="backend/altaC.php" method="POST" enctype="multipart/form-data">
                <h1>Subida de datos de usuario</h1>
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" name="nombre" id=""></td>
                    </tr>
                    <tr>
                        <td>Apellidos: </td>
                        <td><input type="text" name="apellidos" id=""></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" id=""></td>
                        <?php 
                        if(isset($emailError)){
                            print("<p>".$emailError."</p>");
                        }
                        unset($_SESSION["emailError"]);
                        ?>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password1" id=""></td>
                    </tr>
                    <tr>
                        <td>Repite password: </td>
                        <td><input type="password" name="password2" id=""></td>
                        <?php 
                        if(isset($errorPass)){
                            print("<p>".$errorPass."</p>");
                        }
                        unset($_SESSION["errorPass"]);
                        ?>
                    </tr>
                    <tr>
                        <td>Foto de perfil: </td>
                        <td><input type="file" name="imagen"></td>
                    </tr>
                </table>
                <input type="submit" value="Alta nuevo usuario" name="b-alta" class="boton">
                <p>CAMPOS OBLIGATORIOS *</p>
                <?php
                    if(isset($altaOK)){
                        print("<p>Usuario dado de alta correctamente</p>");
                    }
                    unset($_SESSION["altaOK"]);
                ?>
            </form>
        </div>
    </main>
    <?php
    footer();
    ?>
</body>
</html>