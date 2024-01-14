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

function checkuser($user, $password){
    $lista_usuarios = [];
    $file = 'bbdd/data.json';

    $data = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($data);

    foreach($lista_usuarios as $usuario){
        if($user === $usuario->email and password_verify($password, $usuario->password)){
            $usuarioObjeto = new Usuario;
            $usuarioObjeto->nombre = $usuario->nombre;
            $usuarioObjeto->apellidos = $usuario->apellidos;
            $usuarioObjeto->email = $usuario->email;
            $usuarioObjeto->password = $usuario->password;
            $usuarioObjeto->imagen = $usuario->imagen;
            return $usuarioObjeto;
        }
    }
    return null;
}

function existeUsuario($mail) {
    $lista_usuarios = [];
    $file = 'bbdd/data.json';

    $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    foreach ($lista_usuarios as $usuario) {
        if ($usuario->email == $mail) {
            return true;
        }
    }
    return false;
}