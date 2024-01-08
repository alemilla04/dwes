<?php

print "<h2>Mostramos datos con recibe_datos3.php</h2>";
//Recogemos los datos

function recoge($var){
    if(isset($_POST[$var])){
        $tmp = trim($_POST[$var]);
        if($tmp != ""){
            $tmp = trim(htmlspecialchars(strip_tags($tmp)));
            return $tmp;
        }
    }
    return null;
}

$nombre = recoge("nombre");
$edad = recoge("edad");
$curso = recoge("curso");

//Mostramos los datos

if(!is_null($nombre)){
    print "Nombre: $nombre"."<br>";
}
else{
    print "Nombre: No se ha indicado el nombre"."<br>";
}

if(!is_null($edad) && is_numeric($edad)){
    print "Edad: $edad"."<br>";
}
elseif(!is_null($edad) && !is_numeric($edad)){
    print "Edad: La edad debe ser un valor numérico."."<br>";
}
else{
    print "Edad: No se ha indicado la edad"."<br>";
}

if(!is_null($curso)){
    print "Curso: $curso"."<br>";
}
else{
    print "Curso: No se ha indicado el curso"."<br>";
}