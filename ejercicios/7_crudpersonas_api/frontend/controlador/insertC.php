<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    if($nombre == ""){
        $_SESSION["errorNombre"] = "Error el nombre no puede estar vacío";
    }

    if($apellidos == ""){
        $_SESSION["errorApellidos"] = "Error el apellido no puede estar vacío";
    }

    if(!isset($_SESSION["errorNombre"]) and !isset($_SESSION["errorApellidos"])){
        $body_array = array("nombre"=>$nombre, "apellidos"=>$apellidos);

        $body = json_encode($body_array);
        
        $response = conectar_endpoint("POST", "http://127.0.0.1:8000/personas", $body);

        if($response){
            $response = json_decode($response);
            $_SESSION["mensajeAPI"] = $response->mensaje;
        } else {
            $_SESSION["mensajeAPI"] = "Error al insertar los datos";
        }
        header("Location: ".APP_FOLDER."/../insert.php");
        exit();
    }
}else {
    header("Location: ".APP_FOLDER."/../index.php");
    exit();
}