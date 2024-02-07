<?php
require_once(__DIR__."/../src/funciones.php");
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

if($uri[1] !== 'empleados') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$userId = null;
if(isset($uri[2])) {
    $userId = (int)$uri[2];
}



switch($requestMethod) {
    case 'GET': 
        if($userId != null){
            //Tenemos que conectarnos a la bbdd y devolver lista empleados.
            $pdo = conectarDb();
            $empleado = getEmployeeBBDD($userId);

            if($empleado == null) {
                header("HTTP/1.1 500 Internat Server Error");
                exit();
            } 
            $respuesta = $empleado;
            header("HTTP/1.1 200");
            echo json_encode($empleado);
            exit();
        } else{
            $pdo = conectarDb();
            $listaEmpleados = getEmployeesBBDD();

            if($listaEmpleados == null) {
                header("HTTP/1.1 500 Internat Server Error");
                exit();
            }
            $respuesta = $listaEmpleados;
            header("HTTP/1.1 200");
            echo json_encode($respuesta);
            exit();
        }
        break;
    case 'POST':
        $data = (array) json_decode(file_get_contents('php://input', TRUE));
        $pdo = conectarDb();

        $insercionOK = addEmployeeBBDD($data);
        if($insercionOK) {
            $respuesta = ["mensaje"=>"Empleado añadido."];
            header("HTTP/1.1 201");
            echo json_encode($respuesta);
        } else {
            $respuesta = ["mensaje"=>"Error al añadir persona."];
            header("HTTP/1.1 500");
            echo json_encode($respuesta);
            exit();
        }
        break;
    case 'DELETE':
        if($userId == null) {
            header("HTTP/1.1 404 Not Found");
            exit();
        } else {
            $pdo = conectarDb();
            $borrarOK = deleteEmployeeBBDD($userId);

            if($borrarOK) {
                $respuesta = ["mensaje" => "Empleado borrado."];
                header("HTTP/1.1 200 OK");
                echo json_encode($respuesta);
            } else {
                $respuesta = ["mensaje"=>"Error al borrar empleado."];
                header("HTTP/1.1 500");
                echo json_encode($respuesta);
                exit();
            } 
        }
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
}

// file_put_contents("php://stdout", "\nUri:$uri[0]");
// file_put_contents("php://stdout", "\nUri:$uri[1]");
// file_put_contents("php://stdout", "\nUri:$uri[2]");
// file_put_contents("php://stdout", "\nMethod:$requestMethod");
