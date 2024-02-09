<?php
session_start();
require_once(__DIR__."/../includes/funciones.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $body = "{'nombre':'Pepa', 'apellidos':'Pig'}";
    
    $headers = array(
        "Content-Type: application/json"
    );
    
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, "http://127.0.0.1:8000/personas");
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curlHandle, CURLOPT_HEADER, false);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
    
    //execute!
    $response = curl_exec($curlHandle);
    
    //close the connection, release resources used
    curl_close($curlHandle);
    
    echo($response);
}