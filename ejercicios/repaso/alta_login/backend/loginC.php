<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");
require_once(__DIR__."/../includes/modelo.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $loginUsuario = recoge("loginUsuario");
    $loginPassword = recoge("loginPassword");

    $usuarioObjeto = checkUser($loginUsuario, $loginPassword);
    if($usuarioObjeto != null){
        $_SESSION["usuarioLogin"] = $usuarioObjeto;
        header("Location:".APP_FOLDER."/../index.php");
        exit();
    } else{
        $_SESSION["loginError"] = "El usuario y contraseña no existen";
        header("Location:".APP_FOLDER."/../login.php");
    }
} else {
    header("Location:".APP_FOLDER."/../index.php");
}