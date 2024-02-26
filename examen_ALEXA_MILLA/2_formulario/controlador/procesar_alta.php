<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");
require_once(__DIR__."/../config.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST["titulo"];
    $cuerpo = $_POST["cuerpo"];
    $autor = $_POST["autor"];
    $fecha = $_POST["fecha"];
    $categoria = $_POST["categoria"];
    $_SESSION["datosOk"] = true;

    if($titulo == ""){
        $_SESSION["errorTitulo"] = "El título no puede estar vacío";
        $_SESSION["datosOk"] = false;
    } else {
        $_SESSION["noticia"]["titulo"] = $titulo;
    }

    if($cuerpo == ""){
        $_SESSION["errorCuerpo"] = "El cuerpo no puede estar vacío";
        $_SESSION["datosOk"] = false;
    } else {
        $_SESSION["noticia"]["cuerpo"] = $cuerpo;
    }

    if($autor == ""){
        $_SESSION["errorAutor"] = "El autor no puede estar vacío";
        $_SESSION["datosOk"] = false;
    } else {
        $_SESSION["noticia"]["autor"] = $autor;
    }

    if($fecha == ""){
        $_SESSION["errorFecha"] = "Debes elegir una fecha";
        $_SESSION["datosOk"] = false;
    } else {
        $_SESSION["noticia"]["fecha"] = $fecha;
    }

    $_SESSION["noticia"]["categoria"] = $categoria;

    if($_SESSION["datosOk"]) {
        $lista_noticias = obtenerListaNoticias();
        if($lista_noticias!=null){
            $ultimoId = $lista_noticias[(count($lista_noticias)-1)]->id;
            $idNuevo = (int)$ultimoId+1;
            
            $noticia = array(
                "id"=>$idNuevo,
                "titulo"=>$titulo,
                "cuerpo"=>$cuerpo,
                "autor"=>$autor,
                "fecha"=>$fecha,
                "categoria"=>$categoria,
            );
    
            array_push($lista_noticias, $noticia);
    
            $lista_noticias_json = json_encode($lista_noticias, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__."/../bbdd/data.json", $lista_noticias_json);
    
            unset($_SESSION["noticia"]);
    
            header("Location:".APP_FOLDER."/nueva_noticia.php");
            exit();
        }
    } else {
        header("Location:".APP_FOLDER."/nueva_noticia.php");
        exit();
    }
} else {
    header("Location:".APP_FOLDER."/index.php");
    exit();
}
