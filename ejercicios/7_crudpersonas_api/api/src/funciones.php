<?php
require_once(__DIR__ . "/config.php");

function pie() {
    print "<footer>\n";
    print "<p class=\"ultmod\">\n";
    print "Creado por Alexa Milla";
    print "</p>\n";
    print "</footer>\n";
}

function cabecera($texto, $menu) {
    print "<header>\n";
    print "<h1>Base de datos - $texto</h1>\n";
    print "<nav>\n";
    print "<ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "<li><a href='insert.php'>Añadir registro</a></li>\n";
        print "<li><a href='show.php'>Listar</a></li>\n";
        print "<li><a href='borrar-1.php'>Borrar</a></li>\n";
        print "<li><a href='search.php'>Buscar</a></li>\n";
        print "<li><a href='modify.php'>Modificar</a></li>\n";
        print "<li><a href='borrar-todo-1.php'>Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "<li><a href='index.php'>Volver</a></li>\n";
    } else {
        print "<li>Error en la selección de menú</li>\n";
    }
    print "</ul>\n";
    print "</nav>\n";
    print "</header>\n";
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

function recogeLista($var){
    if(isset($_REQUEST[$var]) && is_array($_REQUEST[$var])) {
        return $_REQUEST[$var];
    }
    return null;
}

function conectarDb() {
    global $cfg;

    $dsn_conbbdd = "mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4";
    $dsn_sinbbdd = "mysql:host=$cfg[mysqlHost];charset=utf8mb4";
    $usuario = $cfg["mysqlUser"];
    $contraseña = $cfg["mysqlPassword"];

    try {
        $tmp = new PDO($dsn_conbbdd, $usuario, $contraseña);
    } catch (PDOException $e) {
        $tmp = new PDO($dsn_sinbbdd, $usuario, $contraseña);
    } catch (PDOException $e) {
        return null;
        exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

function getPeopleBBDD() {
    global $cfg;
    global $pdo;

    $consulta = "SELECT * FROM $cfg[nombretabla]";

    $resultado = $pdo->query($consulta);
    if(!$resultado) {
        return null;
    } else {
        $listaPersonas = array();

        foreach($resultado as $registro) {
            $persona = array(
                "id"=>$registro["id"],
                "nombre"=>$registro["nombre"],
                "apellidos"=>$registro["apellidos"],
            );
            array_push($listaPersonas, $persona);
        }
        return $listaPersonas;
    }
}

function addPersonBBDD($empleado) {
    global $cfg;
    global $pdo;
    if($pdo != null){
        $consulta = "INSERT INTO $cfg[nombretabla] (`nombre`, `apellidos`)
         VALUES (:nombre, :apellidos)";
        
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado) {
            return false;
        } elseif(!$resultado->execute([
            ":nombre"=>$empleado["nombre"], 
            ":apellidos"=>$empleado["apellidos"], 
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

function modifyPersonBBDD($persona, $userId){
    global $cfg;
    global $pdo;
    if($pdo != null){
        $consulta = "UPDATE $cfg[nombretabla] SET nombre = :nombre, apellidos = :apellidos WHERE id = :id";
        
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado) {
            return false;
        } elseif(!$resultado->execute([":nombre"=>$persona["nombre"], ":apellidos"=>$persona["apellidos"], ":id"=>$userId])){
            return false;
        } else {
            return true;
            $pdo = null;
        }
    } else {
        return false;
    }
}

function deletePersonBBDD($id) {
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

function getPersonBBDD($id) {
    global $cfg;
    global $pdo;

    $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id = :id";

    $resultado = $pdo->prepare($consulta);

    if(!$resultado) {
        return null;
    } elseif(!$resultado->execute([":id"=>$id])) {
        return null;
    }else{
        //devuelve un array
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
//otra forma de hacerlo
// function getEmployeeBBDD($id) {
//     global $cfg;
//     global $pdo;

//     $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id = $id";

//     $resultado = $pdo->query($consulta);

//     if(!$resultado) {
//         return null;
//     }else{
//         return $resultado->fetch(PDO::FETCH_ASSOC);
//     }
// }

function borraTodo() {
    global $pdo, $cfg;
    
    $consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase]";

    if(!$pdo->query($consulta)) {
        $_SESSION["errorBBDD"] = "<p>Error al borrar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        $consulta = "CREATE DATABASE $cfg[mysqlDatabase]
                    CHARACTER SET utf8mb4
                    COLLATE utf8mb4_unicode_ci";

        if(!$pdo->query($consulta)) {
            $_SESSION["errorBBDD"] = "<p>Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            return false;
        } else {
            $consulta = "USE $cfg[mysqlDatabase]";

            if(!$pdo->query($consulta)) {
                $_SESSION["errorBBDD"] = "<p>Error al seleccionar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                return false;
            } else {
                $consulta = "CREATE TABLE $cfg[nombretabla] (
                id INTEGER UNSIGNED AUTO_INCREMENT,
                nombre VARCHAR(255),
                apellidos VARCHAR(255),
                PRIMARY KEY (id)
                )";

                if(!$pdo->query($consulta)) {
                    $_SESSION["errorBBDD"] = "<p>Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                    return false;
                }
            }
        }
    }
}
