<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");
require_once(__DIR__."/../includes/modelo.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");
    $email = recoge("email");
    $password1 = recoge("password1");
    $password2 = recoge("password2");

    $_SESSION["usuario"]["nombre"] = $nombre;
    $_SESSION["usuario"]["apellidos"] = $apellidos;
    $_SESSION["datosOK"] = true;

    if($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $nombreFichero = $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "bbdd/". $nombreFichero);
    }
        
    if(!str_contains($email, '@') || !str_contains($email, '.')){
        $_SESSION["emailError"] = "Email inválido, debe contener un '@' o un '.'";
        $_SESSION["datosOK"] = false;
    } else{
        if(existeUser($email)){
            $_SESSION["emailError"] = "Error, este correo ya existe.";
            $_SESSION["datosOK"] = false;
        } else{
            $_SESSION["usuario"]["email"] = $email;
        }
    }

    if($password1 === $password2) {
        $_SESSION["usuario"]["password"] = $password2;
    } else{
        $_SESSION["errorPass"] = "Error las contraseñas no coinciden.";
        $_SESSION["datosOK"] = false;
    }

    if($_SESSION["datosOK"]){
        $file = __DIR__."/../bbdd/data.json";
        
        $datos_json = file_get_contents($file, FILE_USE_INCLUDE_PATH);
        if($datos_json == null) {
            $lista_personas = [];
        } else{
            $lista_personas = json_decode($datos_json);
        }
        $password2Hash = password_hash($password2, PASSWORD_DEFAULT);

        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->apellidos = $apellidos;
        $usuario->email = $email;
        $usuario->password = $password2Hash;

        if($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
            $usuario->imagen = $nombreFichero;
        }

        array_push($lista_personas, $usuario);
        $lista_json = json_encode($lista_personas, JSON_PRETTY_PRINT);
        file_put_contents($file, $lista_json);

        unset($_SESSION["usuario"]);
        $_SESSION["altaOK"] = true;
        header("Location:".APP_FOLDER."/../alta.php");
        exit();
    } else {
        header("Location:".APP_FOLDER."/../alta.php");
        exit();
    }
} else { 
    header("Location:".APP_FOLDER."/../index.php");
}