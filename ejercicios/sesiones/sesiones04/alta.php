<?php
session_name("Alexa");
session_start();
// print "<pre>";
// print_r($_POST);
// print "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1 class="h1-alta">Registro de usuario</h1>
    </header>
    <main>
        <div class="usuario">
            <form action="comprobacion_alta.php" method="post" enctype="multipart/form-data">
            <h3 class="alta">Subida de datos de usuario</h3>
            <table class="datos">
                <tr>
                    <td>Nombre:</td> 
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos"></td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td><input type="text" name="telefono"></td>
                </tr>
                <tr>
                    <td>*Email:</td>          
                    <td>
                        <input type="text" name="email" required>
                        <?php
                            if(isset($_SESSION["emailERROR"])){
                                print "<p style='color: red'>$_SESSION[emailERROR]</p>";
                            }
                        ?>
                    </td>          
                </tr>
                <tr>
                    <td>*Password:</td>
                    <td>
                        <input type="text" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td>*Repite el password:</td>
                    <td>
                        <input type="text" name="password2" required>
                        <?php
                            if(isset($_SESSION["passwordERROR"])){
                                print "<p style='color: red'>$_SESSION[passwordERROR]</p>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Foto de perfil: </td>
                    <td>
                        <input type="file" name="image">
                        <?php
                            if(isset($_SESSION["imagenERROR"])){
                                print "<p style='color: red'>$_SESSION[imagenERROR]</p>";
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <p>*CAMPOS OBLIGATORIOS</p>
            <table class="subida">
                <tr>
                    <td><button class="continuar" type="submit" name="submit" value="continuar">Continuar</button></td>
                </tr>
            </table> 
            </form>
        </div>
    </main>
    <footer>
        <hr>
        <p>© Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>