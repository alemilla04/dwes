<?php
    // if(isset($_POST[""]))
    // print "<pre>";
    // print_r($_POST);
    // print "</pre>";


    function rellenar_lista($tam, $min, $max){
        global $lista;
        $lista = [];
        for($i = 0; $i < $tam; $i++){
            $lista[] = rand($min, $max);
        }
    }

    function lista_a_tabla_html($lista){
        $s = '<table border="1">';
        $s .= '<tr>';
        
        foreach($lista as $valor){
            $s .= '<td>' . $valor . '</td>';
        }

        $s .= '</tr></table>';
        $s .= '</table>';
        return $s;
    }

    function pintar_lista($lista){
        
    }

    if(isset($_POST["REQUEST_METHOD"]) == "POST"){
        $OK = true;
        $tamaño = $_POST["tamaño"];
        $minimo = $_POST["minimo"];
        $maximo = $_POST["maximo"];

        if($_POST["submit"] == "generarlista"){
            rellenar_lista($tamaño, $minimo, $maximo);    
        } else if($_POST["submit"] == "reseteardatos"){
            for($i = 0; i <= count($lista); $i++){
                unset($lista[$i]);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F03_Gestor de matrices</title>
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <header>
        <h1>F03_GESTOR DE MATRICES</h1>
    </header>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <p>Tamaño de la lista:<input type="text" name="tamaño"></p>
        <p>Valor mínimo:<input type="text" name="minimo"></p>
        <p>Valor máximo:<input type="text" name="máximo"></p>
        
        <button type="submit" name="submit" value="generarlista">GENERAR LISTA</button>
        <button type="submit" name="submit" value="reseteardatos">RESETEAR DATOS</button>
        
        <hr>
        <?php
            $lista = [4,5,6,2,6,4,6];
            print "<p>Lista con " . count($lista). " elementos</p>";
            if(count($lista) != 0){
                print lista_a_tabla_html($lista);
            }
            print "<br>";

            if($_POST["sumbit"] == "borrarprimero"){
                unset($lista[0]);
            } else if($_POST["sumbit"] == "borrarultimo"){
                unset(count($lista)-1);
            }
        ?>
        <button type="submit" name="submit" value="borrarvalor">BORRAR VALOR</button>
        <button type="submit" name="submit" value="borrarprimero">BORRAR PRIMERO</button>
        <button type="submit" name="submit" value="borrarultimo">BORRAR ÚLTIMO</button>
    </form>
</main>
<footer>
    <hr>    
        <p>Alexa Milla Villavicencio</p>
    </footer>
</body>
</html>