<?php
require_once(__DIR__."/../includes/funciones.php");
$id = $_GET["id"];
$borrarOk = borrarNoticia($id);
if($borrarOk){
    $_SESSION["borrarOk"] = true;
    header("Location: ../index.php");
} else{
    $_SESSION["borrarOk"] = false;
    header("Location: ../index.php");
}

?>