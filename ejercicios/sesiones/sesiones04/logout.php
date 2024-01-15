<?php
session_name("Alexa");
session_start();
session_destroy();
header("Location: home.php");