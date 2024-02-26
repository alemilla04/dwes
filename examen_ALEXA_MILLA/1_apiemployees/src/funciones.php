<?php
require_once(__DIR__."/config.php");


//Esta funcion me devuelve el PDO
function conectarDb()
{
    global $cfg;

    try {
        //Conecto a una bbdd concreta
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        //Conecto pero sin escoger la bbdd. Por ejemplo, si voy a crearla
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        print "    <p>Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
        return null;
        //exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

function obtenerEmpleadosBBDD()
{
    global $cfg;
    global $pdo;

    $consulta = "SELECT * FROM $cfg[nombretabla]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        return null;
    } else {
        $lista_empleados = [];
        foreach($resultado as $registro){
            $empleado = array(
                "id"=>$registro['id'],
                "name"=>$registro['name'],
                "address"=>$registro['address'],
                "salary"=>$registro['salary'],
            );
            array_push($lista_empleados, $empleado);
        }
        return $lista_empleados;
    }
}

function obtenerEmpleadoPorCiudadBBDD($ciudad)
{
    global $cfg;
    global $pdo;
    if($pdo!=null){
        $consulta = "SELECT * FROM $cfg[nombretabla] WHERE address LIKE $ciudad";
    
        $resultado = $pdo->query($consulta);
        if (!$resultado) {
            return null;
        } else {
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        return null;
    }
}

function insertarEmpleadoBBDD($empleado) {
    global $cfg;
    global $pdo;
    if($pdo != null){
        $consulta = "INSERT INTO $cfg[nombretabla] (`name`, `address`, `salary`)
         VALUES (:name_, :address_, :salary_)";
        
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado) {
            return false;
        } elseif(!$resultado->execute([
            ":name_"=>$empleado["name"], 
            ":address_"=>$empleado["address"], 
            ":salary_"=>$empleado["salary"]
            ])){
            return false;
        } else {
            return true;
            $pdo = null;
        }
    } else {
        return false;
    }

}

function borrarEmpleadoBBDD($id) {
    global $cfg;
    global $pdo;
    if($pdo != null){
        $consulta = "DELETE FROM $cfg[nombretabla] WHERE id = :id";
        
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado) {
            return false;
        } elseif(!$resultado->execute([":id"=>$id])){
            return false;
        } else {
            return true;
            $pdo = null;
        }
    } else {
        return false;
    }
}
//resto de funciones
