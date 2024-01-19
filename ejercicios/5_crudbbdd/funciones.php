<?php

require_once ("config.php");

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
        print "<p>Error: No puede conectarse con la base de datos</p>/n";
        exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}