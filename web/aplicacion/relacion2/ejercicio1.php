<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "relacion2",
        "ENLACE" => "/aplicacion/relacion2/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "ejercicio1"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1 de la relación 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    
?>
    
<?php
    $nombre = "Ana";
    $asignatura = "Desarrollo web en entorno servidor";
    //Cadena con ""
    echo "Hola, soy " . $nombre . " y estamos en " . $asignatura;
    echo "<br>Aquí usamos á, é, ñ y ' o  \"<br>";
    echo "Además de &lt;span class=\"prueba\"&gt;Prueba&lt;/span&gt;";
    echo "<br><br>";
    //Cadena con '
    echo 'Hola, soy ' . $nombre . ' y estamos en ' . $asignatura;
    echo '<br>Aquí usamos á, é, ñ y \' o  "<br>';
    echo 'Además de &lt;span class="prueba"&gt;Prueba&lt;/span&gt;';
    echo "<br><br>";
    //Cadena con Heredoc
    echo <<<END
    Hola, soy $nombre y estamos en $asignatura. 
    <br>Aquí usamos á, é, ñ y ' o  "<br>
    Además de &lt;span class="prueba"&gt;Prueba&lt;/span&gt;
    END;
    echo "<br><br>";
    //Cadena con Nowdoc
    echo <<<'EOD'
    Hola, soy 
    EOD;
    echo $nombre;
    echo <<<'EOD'
     y estamos en 
    EOD;
    echo $asignatura;
    echo <<<'EOD'
    <br>Aquí usamos á, é, ñ y ' o  "<br>
    Además de &lt;span class="prueba"&gt;Prueba&lt;/span&gt;
    EOD;
}