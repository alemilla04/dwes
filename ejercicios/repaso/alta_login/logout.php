<?php
session_start();
session_destroy();
require_once(__DIR__."/includes/funciones.php");
header("Location:".APP_FOLDER."/../index.php");