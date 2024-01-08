<?php
//Recogo los datos
print "<h2>Mostramos datos con recibe_datos2.php</h2>";

if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
    // $nombre = $_POST["nombre"];
    //strip_tags quita etiquetas
    //htmlspecialchars transforma carácteres como $, "", etc, en código html en el código fuente.
    $nombre=trim(htmlspecialchars(strip_tags($_POST["nombre"])));
}
else{
    $nombre_error="No se ha escrito ningun nombre";
}

if(isset($_POST["edad"]) && $_POST["edad"] != ""){
    $edad = $_POST["edad"];
}
else{
    $edad_error="No se ha indicado la edad";
}

if(isset($_POST["curso"])){
    $curso = $_POST["curso"];
}
else{
    $curso_error = "No se ha indicado el curso";
}

//Muestro los datos
if(isset($nombre)){
    print "Nombre: $nombre"."<br>";
}
else{
    print "Nombre: $nombre_error"."<br>";
}

if(isset($edad)){
    print "Edad: $edad"."<br>";
}
else{
    print "Edad: $edad_error"."<br>";
}

if(isset($curso)){
    print "Curso: $curso"."<br>";
}
else{
    print "Curso: $curso_error"."<br>";
}

print "<p><a href='formulario2.html'>Volver al formulario</a></p>";