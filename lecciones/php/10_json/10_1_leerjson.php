<?php

$file = 'bbdd/post_1.json';
$jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);

$un_post = json_decode($jsonData);
// $un_post = json_decode($jsonData,true);

imprimirPost($un_post);

//###############AVANZADO
//imprimir el tipo de dato de $un_post
print gettype($un_post) . '<br>';

//Imprimir suelto la fecha y el titulo en castellano
// $un_post = json_decode($jsonData);

// $fecha = date("d/m/Y", $un_post->date);
// $titulo = $un_post->title->es;

// print($fecha);
// print('<br>');
// print($titulo);
//###############FIN AVANZADO

//Formato array
// $fecha = date("d/m/Y", $un_post['date']);
// $titulo = $un_post['title']['es'];

// print($fecha);
// print('<br>');
// print($titulo);

function imprimirPost($noticia)
{
    //lo trato como un objeto
    if(is_object($noticia)){
        echo ("<h2>{$noticia->title->es}</h2>");
        echo ("{$noticia->description->es}");
        echo ("<img src='{$noticia->image}' alt='imagen de playa' width:'20px' height='200px'>");
        echo ("<hr>");
        echo ("<h2>{$noticia->title->en}</h2>");
        echo ("{$noticia->description->en}");
        echo ("<img src='{$noticia->image}' alt='imagen de playa' width:'20px' height='200px'>");
    }
    
    //Lo trato como un array
    if(is_array($noticia)){
        echo ("<h2>{$noticia['title']['es']}</h2>");
        echo ("{$noticia['description']['es']}");
        echo ("<img src='{$noticia["image"]}' alt='imagen de playa' width:'20px' height='200px'>");
        echo ("<hr>");
        echo ("<h2>{$noticia['title']['en']}</h2>");
        echo ("{$noticia['description']['en']}");
        echo ("<img src='{$noticia["image"]}' alt='imagen de playa' width:'20px' height='200px'>");
    }
}