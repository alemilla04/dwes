<?php

require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $borrar = recoge("borrar");

    if($borrar != "Si") {
        header("Location: ".APP_FOLDER."./index.php");
        exit;
    }

    $pdo = conectarDb();

    if($pdo != null) {
        borraTodo();
        header("Location: ".APP_FOLDER."./index.php");
    } else {
        $_SESSION["errorBBDD"] = "PDO es null";
    }
}