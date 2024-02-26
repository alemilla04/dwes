<?php
session_name("Alexa");
session_start();

require_once("modelo.php");
require_once("funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["submit"] == "continuar"){
        $nombre = recoge("nombre");
        $apellidos = recoge("apellidos");
        $email = recoge("email");
        $password = recoge("password");
        $password2 = recoge("password2");

        $_SESSION["usuario"]["nombre"] = $nombre;
        $_SESSION["usuario"]["apellidos"] = $apellidos;
        $_SESSION["ok"] = true;
        
        if($_FILES["image"]["error"] == UPLOAD_ERR_OK){
            $nombreFichero = $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], "bbdd/". $_FILES["image"]["name"]);
        }

        if(isset($email) && $email != ""){
            if(!strpos($email, '@')){
                $_SESSION["emailERROR"] = "Email inválido";
                $_SESSION["ok"] = false;
                header("Location: alta.php");
            }
            else{
                unset($_SESSION["emailERROR"]);
                $_SESSION["usuario"]["email"] = $email;
            }
        }
    
        if(isset($password) && $password != ""){
            if(isset($password2) && $password2 != ""){
                if($password !== $password2){
                    $_SESSION["passwordERROR"] = "Error, las contraseñas no coinciden";
                    $_SESSION["ok"] = false;
                    header("Location: alta.php");
                    exit();
                } else{
                    unset($_SESSION["passwordERROR"]);
                    $_SESSION["usuario"]["password"] = $password;
                }
            }
        }

        if($_SESSION["ok"]) {
            $usuario = new Usuario;
            $usuario->nombre = $nombre;
            $usuario->apellidos = $apellidos;
            $usuario->email = $email;
            $file = "bbdd/data.json";
            $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);

            if ($_FILES["fichero"]["error"] == UPLOAD_ERR_OK) {
                $usuario->imagen = $nombreFichero;
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $usuario->password = $passwordHash;
            
            if($jsonData == null){
                $lista_personas = [];
            } else{
                $lista_personas = json_decode($jsonData);
            }
            
            array_push($lista_personas, $usuario);
            $json_lista_personas = json_encode($lista_personas, JSON_PRETTY_PRINT);
    
            file_put_contents("bbdd/data.json", $json_lista_personas);

            $date = date("Y-m-d H:i:s");
            
            setcookie("Ultimo_usuario", $usuario->email, time() + 3600 * 24 * 10, "/");
            setcookie("Ultimo_usuario_fecha", $date, time() + 3600 * 24 * 10, "/");

            unset($_SESSION["usuario"]);
        }
        
    }
    
}

header('Location: login.php');
