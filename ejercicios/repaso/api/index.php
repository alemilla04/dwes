<?php
require_once(__DIR__."/src/funciones.php");
header("Access-Control-Allow-Origin: *");

// header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: text/plain; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//uri recoge la url del api
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($uri[1] !== "personas") {
    header("HTTP/1.1 404 NOT FOUND");
    exit();
}

$userId = null;
if(isset($uri[2])){
    $userId = (int)($uri[2]);
}

switch($requestMethod) {
    case "GET":
        if($userId != null){
            $pdo = conectarDb();
            $persona = getPersonBBDD($userId);
            if($persona == null){
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            }
            $resultado = $persona;
            header("HTTP/1.1 200 OK");
            echo json_encode($resultado, JSON_PRETTY_PRINT);
        } else {
            $pdo = conectarDb();
            $lista_personas = getPeopleBBDD();
            if($lista_personas == null){
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            }
            header("HTTP/1.1 200 OK");
            echo json_encode($lista_personas, JSON_PRETTY_PRINT);
        }
        break;
    case "POST":
        $data = (array) json_decode(file_get_contents('php://input', TRUE));
        $pdo = conectarDb();
        $insercionOK = addPersonBBDD($data);

        if(!$insercionOK) {
            header("HTTP/1.1 500 Internal Server Error");
            exit();
        } else{
            header("HTTP/1.1 200 OK");
            echo("Persona añadida correctamente");
        }
        break;
    case "DELETE":
        if($userId == null) {
            echo("Falta especificar id");
            exit();
        } else{
            $pdo = conectarDb();
            $deleteOK = deletePersonBBDD($userId);

            if(!$deleteOK){
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            } else{
                header("HTTP/1.1 200 OK");
                echo("Persona eliminada correctamente.");
            }
        }
        break;
    case "PUT":
        $data = (array) json_decode(file_get_contents('php://input', TRUE));
        
        if($userId == null){
            echo("Falta especificar el id");
            exit();
        } else{
            $pdo = conectarDb();
            $actualizarOK = updatePersonBBDD($userId, $data);
            if(!$actualizarOK) {
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            } else{
                header("HTTP/1.1 200 OK");
                echo("Persona modificada correctamente");
            }
        }
        break;
}