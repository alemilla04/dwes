<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = recoge("id");
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");

    $_SESSION["modificarOK"] = false;

    if($nombre == ""){
        $_SESSION["errorNombre"] = "Error, el nombre no puede estar vacío.";
    }

    if($apellidos == ""){
        $_SESSION["errorApellidos"] = "Error, el apellido no puede estar vacío.";
    }

    if(!isset($_SESSION["errorNombre"]) and !isset($_SESSION["errorApellidos"])){
        $pdo = conectarDb();
        if($pdo != null){
            $consulta = "UPDATE $cfg[nombretabla] SET nombre = :nombre, apellidos = :apellidos WHERE id = :id";
            $resultado = $pdo->prepare($consulta);
    
            if(!$resultado) {
                print $_SESSION["errorBBDD"] = "<p>Error al preparar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif(!$resultado->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos, ":id"=>$id])){
                print $_SESSION["errorBBDD"] = "<p>Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                $_SESSION["modificarOK"] = true;
                $pdo = null;
            }
        } else {
            $_SESSION["errorBBDD"] = "PDO es null";
        }
        header("Location: ".APP_FOLDER."/modify.php");
        exit();    
    }
    header("Location: ".APP_FOLDER."/modify-2.php");
    exit();
} else {
    header("Location: ".APP_FOLDER."/index.php");
    exit();
}