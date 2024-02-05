<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = recoge("id");

    $pdo = conectarDb();
    $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id = :id";
    $resultado = $pdo->prepare($consulta);

    if (!$resultado) {
        print $_SESSION["errorBBDD"] = "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } elseif (!$resultado->execute([":id"=>$id])){
        print $_SESSION["errorBBDD"] = "<p>Error al ejecutar la consulta. SQLSTATE[{[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n"; 
    } else {
        foreach($resultado as $registro) {
            $_SESSION["persona"]["id"] = $registro["id"];
            $_SESSION["persona"]["nombre"] = $registro["nombre"];
            $_SESSION["persona"]["apellidos"] = $registro["apellidos"];
        }
        $pdo = null;
        header("Location: ".APP_FOLDER."/modify-2.php");
        exit();
    }
} else{
    header("Location: ".APP_FOLDER."/index.php");
    exit();
}