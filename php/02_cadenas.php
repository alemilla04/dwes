<?php

    $nombre = "Juan Antonio";
    $apellidos = "Cuello";

    print "<p>Mi nombre es \"$nombre $apellidos\"</p>\n";
    print "<p>Mi nombre es ". $nombre ." " . $apellidos ."</p>\n";

    $aleatorio = rand(1, 100);

    print "<p>Numero aleatorio: ".$aleatorio."</p>";