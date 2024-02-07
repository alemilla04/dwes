<?php

define("SQLITE", 2);
define("MYSQL", 1);

define("MENU_PRINCIPAL", 1);
define("MENU_VOLVER", 2);

$cfg["dbMotor"] = MYSQL;

$cfg["mysqlHost"] = "127.0.0.1";
$cfg["mysqlUser"] = "root";
$cfg["mysqlPassword"] = "";
$cfg["mysqlDatabase"] = "empleados_api";

$cfg["nombretabla"] = "employees";

// define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])));