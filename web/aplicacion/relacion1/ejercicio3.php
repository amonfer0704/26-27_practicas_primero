<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//Varias sentencias
//Crear una variable de tipo array
$array = [];

//Rellenar las posiciones 1, 16, 54 con valores cualquiera
$array[1] = "Pepe";
$array[16] = 123;
$array[54] = false;

//Añadir el valor 34 al final
array_push($array, 34);

//Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
$array["uno"] = "cadena";
$array["dos"] = true;
$array["tres"] = 1.345;

//Rellenar la posición “ultima” con el array (1,34,”nueva”);
$array["ultima"] = array(1.34, "nueva");

//una sola sentencia
$array2 = array (
    1 => "Pepe",
    16 => 123,
    54 => false,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => array(1.34, "nueva"),
    34
);

//Una sola sentencia con []
$array3 = [
    1 => "Pepe",
    16 => 123,
    54 => false,
    "uno" => "cadena",
    "dos" => true,
    "tres" => 1.345,
    "ultima" => array(1.34, "nueva"),
    34
];



//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 3 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3");
cuerpo($array, $array2, $array3);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($array, $array2, $array3){
    echo "Primer array<br>";
    foreach($array as $array1 => $clave){
        if(is_array($array1)){
            foreach($clave as $valorArray){
                echo $valorArray . " ";
            }
        }
        else{
            echo $array1 . " ";
        }
    }
    echo "<br>Segundo array<br>";
    foreach($array2 as $segundoArray => $claveSegundo){
        if(is_array($segundoArray)){
            foreach($claveSegundo as $valorArraySegundo){
                echo $valorArraySegundo . " ";
            }
        }
        else{
            echo $segundoArray . " ";
        }
    }
    echo "<br>Tercer array</br>";
    foreach($array3 as $tercerArray => $claveTercero){
        if(is_array($claveTercero)){
            foreach($claveTercero as $valorArrayTercero){
                echo $valorArrayTercero . " ";
            }
        }
        else{
            echo $tercerArray . " ";
        }
    }
?>


<?php

}
