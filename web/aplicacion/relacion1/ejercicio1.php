<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
    $numBinario = 0b10011;
    $numOctal = 0755;
    $numHexadecimal = 0x12A;
{
?>
    <h2>Funciones matemáticas</h2>
    <ul>
        <li>round(3.14159, 2) = <? echo round(3.14159, 2)?></li>
        <li>round(7.5) = <? echo round(7.5)?></li>
        <li>floor(7.9) = <? echo floor(7.9)?></li>
        <li>pow(2, 10) = <? echo pow(2, 10)?></li>
        <li>sqrt(144) = <? echo sqrt(144)?></li>

    </ul>
    
<?php
}
