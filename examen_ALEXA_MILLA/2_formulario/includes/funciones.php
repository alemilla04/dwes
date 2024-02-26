<?php


function obtenerListaNoticias()
{
    $lista_noticias = [];
    $noticias_json = file_get_contents(__DIR__."/../bbdd/data.json");
    if($noticias_json==null){
        $lista_noticias = [];
    } else {
        $lista_noticias = json_decode($noticias_json);
        return $lista_noticias;
    }    
    return null;
}



function añadirNoticia($nueva_noticia)
{

    $bbddfile = BBDDFILE;
}

function obtenerNoticia($id){
    $noticias_json = file_get_contents(__DIR__."/../bbdd/data.json", FILE_USE_INCLUDE_PATH);
    if($noticias_json==null) {
        $lista_noticias = [];
    } else {
        $lista_noticias = json_decode($noticias_json);
    }

    $id = $_GET["id"];

    if($lista_noticias!=null){
        foreach($lista_noticias as $noticia){
            if($noticia->id == $id){
                return $noticia;
            }
        }
    }
    return null;
}

function borrarNoticia($id){
    $lista_noticias = obtenerListaNoticias();
    $lista_noticias_copia = [];

    if($lista_noticias != null){
        foreach($lista_noticias as $noticia){
            if($noticia->id != $id){
                array_push($lista_noticias_copia, $noticia);
            }
        }
        $lista_noticias_json = json_encode($lista_noticias_copia, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__."/../bbdd/data.json", $lista_noticias_json);
        return true;
    }
    return false;
}
