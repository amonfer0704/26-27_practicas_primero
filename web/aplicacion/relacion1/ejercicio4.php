<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
const FILAS = 5;

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    $piramide = [];
    for($i = 1; $i <= FILAS; $i++){
        $fila = [];
        for($j = 0; $j < $i; $j++){
            array_push($fila, $i);
        }
        array_push($piramide, $fila);
    }

    foreach($piramide as $valor){
        foreach($valor as $numero){
            echo $numero . " ";
        }
        echo "<br>";
    }
}
