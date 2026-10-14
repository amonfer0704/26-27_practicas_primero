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
        "TEXTO" => "ejercicio2"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2 de la relación 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    
?>
    
<?php
    $cadena = "Está la niña en casa";
    //Mostrar cada carácter en una línea separada y tantos espacios en blanco como indica la posición del caracter mostrado
    //Prueba con mb_substr
    for($i = 0; $i < mb_strlen($cadena); $i++){
        echo str_repeat("&nbsp;", $i);
        echo mb_substr($cadena, $i, 1);
        echo "<br>";
    }
    //Prueba con []
    for($i = 0; $i < strlen($cadena); $i++){
        echo str_repeat("&nbsp;", $i);
        echo $cadena[$i];
        echo "<br>";
    }
    //Prueba con substr
    for($i = 0; $i < strlen($cadena); $i++){
        echo str_repeat("&nbsp;", $i);
        echo substr($cadena, $i, 1);
        echo "<br>";
    }
    //Mostrar la cadena en orden inverso
    for($i = 0; $i < mb_strlen($cadena); $i++){
        echo str_repeat("&nbsp;", $i);
        $caracter = mb_substr($cadena, -($i + 1), 1);

    if ($i % 2 == 0) {
        echo mb_strtoupper($caracter);
    } else {
        echo mb_strtolower($caracter);
    }

    echo "<br>";
    }
    //Separa la cadena en partes usando el carácter a

    
}