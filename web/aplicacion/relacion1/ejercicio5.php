<?php

use function PHPSTORM_META\type;

include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
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
inicioCuerpo("Ejercicio 5");
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $vector){
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
