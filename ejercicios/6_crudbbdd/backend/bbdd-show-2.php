<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if(isset($_SESSION["listar"])) {
    $pdo = conectarDb();
    $consulta = "SELECT * FROM $cfg[nombretabla]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        $_SESSION["errorBBDD"] = "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        $listaPersonas = array();
        
        foreach($resultado as $registro){
            $persona = array("id" => $registro["id"], "nombre" => $registro["nombre"], "apellidos" => $registro["apellidos"]);
            array_push($listaPersonas, $persona);
        }
        $_SESSION["listaPersonas"] = $listaPersonas;
    }
    header("Location: ".APP_FOLDER."/borrar-1.php");
    exit();
    
} else {
    header("Location: ".APP_FOLDER."/index.php");
    exit();
}