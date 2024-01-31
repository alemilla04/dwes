<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $listaids = recogeLista("listaids");
    $_SESSION["borrarOK"] = false;

    $pdo = conectarDb();
    if($pdo!=null) {
        $consulta = "DELETE FROM $cfg[nombretabla] WHERE id = :id";
        $resultado = $pdo->prepare($consulta);

        foreach($listaids as $id => $valor){
            if(!$resultado) {
                $_SESSION["errorBBDD"] = "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } elseif(!$resultado->execute([":id"=>$id])){
                $_SESSION["errorBBDD"] = "<p>Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            } else {
                $_SESSION["borrarOK"] = true;
                $pdo = null;
            }
        }
    } else {
        $_SESSION["errorBBDD"] = "PDO es null";
    }

    header("Location: ".APP_FOLDER."/borrar-1.php");
    // exit();
} else {
    header("Location: ".APP_FOLDER."/index.php");
    exit();
}
?>