<?php
require_once(__DIR__."/src/funciones.php");
//##################################################
//  API REST Employee.
//  Lista de endpoints
// 
//  - GET /                         Muestra la info de la API 
//  - GET /empleados                Todos los empleados
//  - GET /empleados/ciudad/Lorca       Empleados con direccion="Lorca"
//  - POST /empleados            Añadir un empleado
//  - DELETE /empleados/X        Borrar el empleado con ID=X
//  - DELETE /empleados/X-Y      Borrar los empleados desde ID=X hata ID=Y
//##################################################


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//==== AYUDA Ejemplos de cabeceras de respuesta ======
//header("HTTP/1.1 404 Not Found");
//header("HTTP/1.1 200");
//header("HTTP/1.1 500 Internat Server Error");
//header("HTTP/1.1 201 Created");
//header("HTTP/1.1 204 No Content");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$requestMethod = $_SERVER["REQUEST_METHOD"];


//======== DEBUG ==========
// print_r($uri);
// exit();
//======== FIN DEBUG ==========


//===== ANALISIS DE URL ===========================
if($uri[1] != ""){
    if($uri[1]!=="empleados"){
        header("HTTP/1.1 404 Not Found");
        exit();
    }
} else {
    $info = array(
        "info"=>"API REST de empleados",
        "GET /empleados"=>"Devuelve todos los empleados",
        "GET /empleados/localidad/Lorca"=>"Devuelve empleados de Lorca",
        "GET /empleados/salario/5000"=>"Devuelve empleados con salario >=1000€",
        "POST /empleados/salario/5000"=>"Devuelve empleados con salario >=1000€",
        "DELETE /empleados/5"=>"Borra el empleado con ID=5",
    );
    $info_json = json_encode($info, JSON_PRETTY_PRINT);
    header("HTTP/1.1 200");
    echo($info_json);
}

if(isset($uri[2])){
    if($uri[2] !== "ciudad"){
        header("HTTP/1.1 404 Not Found");
        exit();  
    } elseif($uri[2] == "ciudad" && $uri[3] == ""){
        header("HTTP/1.1 404 Not Found");
        exit();
    }
}

$ciudad = "";
if(isset($uri[3])){
    $ciudad = (string)$uri[3];
}



//===== FIN ANALISIS DE URL ===========================


switch ($requestMethod) {
    case 'GET':
        // if($uri[1] == "empleados"){
            $pdo = conectarDb();
            $lista_empleados = obtenerEmpleadosBBDD();
            if($lista_empleados == null){
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            } else {
                header("HTTP/1.1 200");
                echo(json_encode($lista_empleados, JSON_PRETTY_PRINT));
            }
        // } 
        if($ciudad != ""){
            $pdo = conectarDb();
            $empleado = obtenerEmpleadoPorCiudadBBDD($ciudad);
            if($empleado==null){
                header("HTTP/1.1 500 Internal Server Error");
                exit();
            } else {
                header("HTTP/1.1 200");
                echo(json_encode($empleado, JSON_PRETTY_PRINT));
            }
        }
        break;

    case 'POST':
        $data = (array)json_decode(file_get_contents('php://input'), TRUE);
        $insercionOK = insertarEmpleadoBBDD($data);
        if($insercionOK){
            header("HTTP/1.1 200 OK");
            $respuesta = ["mensaje"=>"Persona añadida correctamente"];
            echo(json_encode($respuesta, JSON_PRETTY_PRINT));
        } else{
            header("HTTP/1.1 500 Internal Server Error");
            exit();
        }
        break;

    case 'DELETE':
        $id = null;
        if(isset($uri[2])){
            $id = (int)$uri[2];
        }
        if($id!=null){
            $pdo = conectarDb();
            $borrarOk = borrarEmpleadoBBDD($id);   
            if($borrarOk){
                header("HTTP/1.1 200");
                $respuesta = ["mensaje"=>"Persona borrada correctamente."];
                echo(json_encode($respuesta, JSON_PRETTY_PRINT));
            }
        }
        break;

    default:
        header("HTTP/1.1 404 Not Found");
        exit();
}
