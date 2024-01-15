<?php
session_name("Alexa");
session_start();
require_once("funciones.php");
require_once("modelo.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = recoge("usuario");
    $password = recoge("password");
    
    if($password == null or $username == null) {
        $_SESSION['errorLogin'] = "Los campos no pueden estar vacios";
        header('Location: login.php');
        return;
    }

    $usuario = checkuser($username, $password); 

    if($usuario == null ) {
        $_SESSION['errorLogin'] = "Credenciales inválidas";
        header('Location: login.php');
        return;
    } else {
        unset($_SESSION['errorLogin']);
        $_SESSION["usuarioObjeto"] = $usuario;
        header("Location: home.php");
    }

}