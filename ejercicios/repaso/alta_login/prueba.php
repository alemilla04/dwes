<?php
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
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
                <h1>Subida de datos de usuario</h1>
                <table>
                    <tr>
                        <td>Foto de perfil: </td>
                        <td><input type="file" name="imagen" id=""></td>
                    </tr>
                </table>
                <input type="submit" value="Alta nuevo usuario" name="b-alta" class="boton-alta">
</body>
</html>