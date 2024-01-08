<?php
session_start();

if(!isset($_SESSION['numero'])){
    header("Location: sesion02_1.php");
    exit;
}

function recoge($var){
    if(isset($_POST[$var])){
        if($_POST[$var] != ""){
            $tmp = trim(htmlspecialchars(strip_tags($_POST[$var])));
            return $tmp;
        }
    }
    return null;
}

$accion = recoge('accion');

if($accion == "borrar"){
    $_SESSION["numero"] = 0;
} elseif($accion == "mas" and $_SESSION["numero"] < 9){
    $_SESSION["numero"]++;
} elseif($accion == "menos" and $_SESSION["numero"] > 0){
    $_SESSION["numero"]--;
}

header("Location: sesion02_1.php");

// if($accion == "borrar"){
//     $_SESSION["numero"] = 0;
// } elseif($accion == "mas"){
//     $_SESSION["numero"] ++;
// } elseif($accion == "menos"){
//     $_SESSION["numero"] --;
// }