<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = recoge("id");
    
    if($id!=null) {
        $respuesta = conectar_endpoint("GET", "http://127.0.0.1:8000/personas/".$id, null);
        $persona = json_decode($respuesta);
        $_SESSION["persona"] = $persona;
        header("Location:".APP_FOLDER."/../modify-2.php");
        exit();
    }
    else {
        $_SESSION["mensajeAPI"] = "Error al obtener la persona";
        header("Location:".APP_FOLDER."/../modify-1.php");
        exit();
    }
}
else {
    header("Location:".APP_FOLDER."/../index.php");
    exit();
}
?>