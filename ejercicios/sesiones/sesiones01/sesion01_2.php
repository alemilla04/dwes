<?php
session_start();

function recoge($var){
    if(isset($_POST[$var])){
        if($_POST[$var] != ""){
            $tmp = trim(htmlspecialchars(strip_tags($_POST[$var])));
            return $tmp;
        }
    }
    return null;
}

if($_POST["button"] == "comprobar"){
    $mayus = recoge("mayus"); 
    $minus = recoge("minus"); 
    
    $_SESSION['mayus'] = $mayus;
    $_SESSION['minus'] = $minus;

    if($mayus == ""){
        $_SESSION['mayusError'] = "No se ha escrito ninguna palabra";
        // unset($_SESSION["mayus"]);
    }

    elseif(!ctype_upper($mayus)){
        $_SESSION['mayusError'] = "No se ha escrito la palabra en mayúscula";
        // unset($_SESSION["mayus"]);
    } 

    else{
        unset($_SESSION['mayusError']);
    }

    if($minus == ""){
        $_SESSION['minusError'] = "No se ha escrito ninguna palabra";
        // unset($_SESSION["minus"]);
    } 
    
    elseif(!ctype_lower($minus)){
        $_SESSION['minusError'] = "No se ha escrito la palabra en minúscula";
        // unset($_SESSION["minus"]);
    } 
    
    else{
        unset($_SESSION['minusError']);
    }

    header("location: sesion01_1.php");
} elseif($_POST["button"] == "borrar"){
    unset($_SESSION["mayus"]);
    unset($_SESSION["minus"]);
    header("location: sesion01_1.php");
}