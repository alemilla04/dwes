<?php

function recoge($var){
    if(isset($_POST[$var])){
        if($_POST[$var] != ""){
            $tmp = trim(htmlspecialchars(strip_tags($_POST[$var])));
            return $tmp;
        }
    }
    return null;
}

function checkuser($user, $password, $data){
    foreach($data as $usuario){
        if($user === $usuario->email){
            if($password === $usuario->password){
                return $usuario;
            }
        }
    }
    return null;
}