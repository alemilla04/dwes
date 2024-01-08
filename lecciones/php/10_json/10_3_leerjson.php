<?php
$persona = array(
    "nombre" => "Juan",
    "email" => "juan@test.com",
    "telefono" => "600111111"
);

$json_persona = json_encode($persona, JSON_PRETTY_PRINT);

print "<pre>";
print_r($json_persona);
print "</pre>";

$file = 'bbdd/datos1.json';

file_put_contents($file, $json_persona);