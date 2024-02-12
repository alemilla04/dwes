<?php
session_start();
require_once(__DIR__."/includes/funciones.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $listaids = recogeLista("listaids");

    if($listaids!=null) {
        foreach($listaids as $id) {
            $response = conectar_endpoint("DELETE", "127.0.0.1:8000", null);
        }
    }
}
?>