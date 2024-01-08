<?php
session_name("Alexa");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
    <header>Tus datos🐱‍🐉</header>
    <div>
        <table>
            <tr>
                <th>Foto de perfil</th>
            <?php
            require_once("funciones.php");
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $user = recoge("usuario");
                $password = recoge("password");
                
                $json_url = "bbdd/data.json";
                $json = file_get_contents($json_url);
                $data = json_decode($json);
                
                $usuario = checkuser($user, $password, $data);
                
                if($usuario!=null){
                    if($usuario->nombre != null){
                        print "<th>Nombre</th>";
                    }
                    
                    if($usuario->apellidos != null){
                        print "<th>Apellidos</th>";
                    }
                    
                    if($usuario->telefono != null){
                        print "<th>Teléfono</th>";
                    }

                    print "<th>Email</th>";
                    print "<th>Password</th>";
                    print "</tr>";
        
                    print "<tr>";
                    print "<td><img src='bbdd/$usuario->imagen' alt='foto perfil' width='100px'></td>";
                    if($usuario->nombre != null){
                        print "<td>$usuario->nombre</td>";
                    }

                    if($usuario->apellidos != null){
                        print "<td>$usuario->apellidos</td>";
                    }

                    if($usuario->telefono != null){
                        print "<td>$usuario->telefono</td>";
                    }

                    print "<td>$usuario->email</td>";
                    print "<td>$usuario->password</td>";
                    print "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <p class="volver_login"><a href="login.php">Volver al login</a></p>
    <p class="volver_alta"><a href="alta.php">Volver al alta</a></p>
</body>
</html>