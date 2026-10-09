<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 6 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 6");
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($vector){
?>
    <h3>Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de
recorrido para mostrar tanto los índices como los valores del array anterior</h3>
<?php
    while(key($vector) != NULL){
        echo key($vector) . " - " . current($vector) . "<br>";
        next($vector);
    }

?>
    <h3>Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
mostrar tanto los índices como los valores del array anterior.</h3>
<?php
    $indices = array_keys($vector);
    $valores = array_values($vector);
    for($i = 0; $i < count($vector); $i++){
        echo $indices[$i] . " - " . $valores[$i] . "<br>";
    }
}
