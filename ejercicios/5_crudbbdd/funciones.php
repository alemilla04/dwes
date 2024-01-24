<?php

require_once("config.php");

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
        print "<p>Error: No puede conectarse con la base de datos</p>/n";
        exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

function borraTodo() {
    global $pdo, $cfg;

    print "<p>Sistema Gestor de Base de Datos: MySQL</p>\n";
    
    $consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase]";

    if(!$pdo->query($consulta)) {
        print "<p class=\"aviso\">Error al borrar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "<p>Base de datos borrada correctamente (si existía).</p>\n";

        $consulta = "CREATE DATABASE $cfg[mysqlDatabase]
                    CHARACTER SET utf8mb4
                    COLLATE utf8mb4_unicode_ci";

        if(!$pdo->query($consulta)) {
            print "<p class=\"aviso\">Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            return false;
        } else {
            print "<p>Base de datos creada correctamente.</p>\n";

            $consulta = "USE $cfg[mysqlDatabase]";

            if(!$pdo->query($consulta)) {
                print "<p class=\"aviso\">Error al seleccionar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                return false;
            } else {
                print "<p>Base de datos seleccionada correctamente.</p>\n";

            $consulta = "CREATE TABLE $cfg[nombretabla] (
                id INTEGER UNSIGNED AUTO_INCREMENT,
                nombre VARCHAR(255),
                apellidos VARCHAR(255),
                PRIMARY KEY (id)
                )";

                if(!$pdo->query($consulta)) {
                    print "<p class=\"aviso\">Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                    return false;
                } else {
                    print "<p>Tabla creada correctamente.</p>\n";
                }
            }
        }
    }
}
