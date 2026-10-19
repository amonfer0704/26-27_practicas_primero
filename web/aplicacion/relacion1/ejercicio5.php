<?php

use function PHPSTORM_META\type;

include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "relacion1",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "ejercicio5"
    ]
];
$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5", $barra);
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $vector){
    /*
    Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
    - posicion XXX contenido (tipo) YYYYY
    - Según el tipo del contenido
    o Si es un array mostrarlo mediante un foreach.
    o Si es un entero poner Entero con valor DDD, en binario BBB
    o Si es un real DDD que al cuadrado es DDD
    o Si es una cadena -CCCC-
    o Si es un booleano BBB y su opuesto XXX
    Las palabras en mayúscula representan un valor concreto de lo pedido */
    $posicion = 0;
    foreach($vector as $clave => $valor){
        echo "Posición " . $posicion . " contenido (";
        if(gettype($valor) == "string"){
            echo "cadena) -" .$valor . "-";
        }
        if(gettype($valor) == "integer"){
            echo "Entero) con valor " . $valor . ", en binario " . decbin($valor);
        }
        if((gettype($valor) == "double") || (gettype($valor) == "float")){
            echo "real) " . $valor . " que al cuadrado es " . pow($valor, 2);
        }
        if(gettype($valor) == "boolean"){
            echo "boolean) " . $valor . " y su opuesto " . (!$valor?"True":"False");
        }
        if(gettype($valor) == "array"){
            echo "array) ";
            foreach($valor as $elementos){
                echo $elementos . " ";
            }
        }
        $posicion++;
        echo "<br>";
    }
?>
    
<?php
}
