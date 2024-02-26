<?php
function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        if ($_REQUEST[$var] != "") {
            $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
            return $tmp;
        }
    }
    return null;
}

function cabecera() {
    print "<header>";
    print "<h1>ALTA Y LOGIN DE USUARIOS</h1>";
    print "</header>";
    print "<nav>";
    print "<ul>";
    print "<li><a href='./index.php'>Home</a></li>";
    print "<li><a href='./alta.php'>Alta</a></li>";
    if(isset($_SESSION["usuarioLogin"])){
        $usuario = $_SESSION["usuarioLogin"];
        print "<li>Hola, $usuario->email</li>";
        print "<li><a href='./perfil.php'>Perfil</a></li>";
        print "<li><a href='./logout.php'>Logout</a></li>";
    } else{
        print "<li class='li-login'><a href='./login.php'>Login</a></li>";
    }
    print "</ul>";
    print "</nav>";
}

function footer() {
    print "<footer>";
    print "© Creado por: <strong>Alexa Milla Villavicencio</strong>";
    print "<p>Asignatura: Desarrollo web entorno servidor</p>";
    print "</footer>";
}

define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])));

function existeUser($email) {
    $lista_usuarios = [];
    $file = __DIR__."/../bbdd/data.json";

    $lista_usuarios_json = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($lista_usuarios_json);

    foreach($lista_usuarios as $usuario){
        if($usuario->email === $email){
            return true;
        }
    }
    return false;
}

function checkUser($user, $password) {
    $lista_usuarios = [];
    $file = __DIR__."/../bbdd/data.json";

    $lista_usuarios_json = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($lista_usuarios_json);

    foreach($lista_usuarios as $usuario){
        if($usuario->email == $user && password_verify($password, $usuario->password)){
            return $usuario;
        }
    }
    return null;
}