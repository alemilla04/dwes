<?php
require_once("config.php");

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

function getPeopleBBDD(){
    global $cfg;
    global $pdo;

    $consulta = "SELECT * FROM $cfg[nombretabla]";
    $resultado = $pdo->query($consulta);

    if(!$resultado){
        return null;
    } else {
        $listaPersonas = [];
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

function getPersonBBDD($userId) {
    global $cfg;
    global $pdo;

    if($pdo!=null){
        $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id = :id";
        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return null;
        } elseif(!$resultado->execute([":id"=>$userId])){
            return null;
        } else {
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }
    } else{
        return null;
    }
}

function addPersonBBDD($person){
    global $cfg;
    global $pdo;

    if($pdo!=null){
        $consulta = "INSERT INTO $cfg[nombretabla] (nombre, apellidos) VALUES (:nombre, :apellidos)";
        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([":nombre"=>$person["nombre"], ":apellidos"=>$person["apellidos"]])){
            return false;
        } else{
            return true;
            $pdo = null;
        }
    } else {
        return false;
    }
}

function updatePersonBBDD($userId, $person) {
    global $cfg;
    global $pdo;

    if($pdo!=null){
        $consulta = "UPDATE $cfg[nombretabla] SET nombre = :nombre, apellidos = :apellidos WHERE id = :id";
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([":nombre"=> $person["nombre"], ":apellidos"=> $person["apellidos"], ":id"=> $userId])) {
            return false;
        } else{
            return true;
            $pdo = null;
        }
    } else {
        return false;
    }
}

function deletePersonBBDD($userId) {
    global $cfg;
    global $pdo;

    if($pdo != null){
        $consulta = "DELETE FROM $cfg[nombretabla] WHERE id = :id";
        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute(["id"=>$userId])){
            return false;
        } else{
            return true;
            $pdo = null;
        }
    } else { 
        return false;
    }
}