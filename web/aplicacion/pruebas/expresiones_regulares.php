<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$cadena = 'Tienes 256 34 años';

//buscar años
$exp = '/años/';
$resultado = [];
preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

//buscar número
$exp = '/[0123456789]+/';
$exp = '/[0-9]+/';
$exp = '/\d+/';
$exp = '/\d{1,}/';
$exp = '/[[:digit:]]+/';
//buscar un número real

$cadena = 'tienes 54 Años 258.34 años';
$exp = "/\d+\.\d/";

//modificadores
//distingo entre mayúsculas y minúsculas
$exp = '/años/';

//no distingo entre mayúsculas y minúsculas
$exp = '/años/i';
$resultado = [];
preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

//busco un número con 2 cifras
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Expresiones regulares");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{


}
