<?php

define("MYSQL", 1);
define("MENU_PRINCIPAL", 1);
define("MENU_VOLVER", 2);

$cfg["dbMotor"] = MYSQL;

$cfg["mysqlHost"] = "localhost";
$cfg["mysqlUser"] = "root";
$cfg["mysqlPassword"] = "";
$cfg["mysqlDatabase"] = "crudpersonas";

$cfg["nombretabla"] = "personas";

define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])));