<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/val_normal.php");
include_once(dirname(__FILE__) . "/val_filter.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/relacion5/index.php",
    ],
    [
        "TEXTO" => "librerias filtrado",
    ]
];
//$usuario = getenv("MYSQL_USER");
/**
 * Variables de prueba 
 */
$numEntero = 5;
$numReal = 5.6;
$ejFecha = "5/11/2026";
$ejHora = "0:5:1";
$ejEmail = "ana@gmail.com";
$ejCadena = "hola mundo";
//dibuja la plantilla de la vista
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("Prueba filtrado", $barra);
cuerpo($numEntero, $numReal, $ejFecha, $ejHora, $ejEmail, $ejCadena);//llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($numEntero, $numReal, $ejFecha, $ejHora, $ejEmail, $ejCadena)
{
?>

<?php
    echo "VALIDACIÓN CON LA LIBRERIA VAL_NORMAL";
    echo "<br>Validación número entero (5, rangos 1, 10, defecto 3): " . (\VALNORMAL\validaEntero($numEntero, 1, 10, 3)?"Correcto":"Error") . " (" . $numEntero . ")";
    echo "<br>Validación número entero (5, rangos 6, 10, defecto 3): " . (\VALNORMAL\validaEntero($numEntero, 6, 10, 3)?"Correcto":"Error") . " (" . $numEntero . ")";
    echo "<br>Validación número real (5.6, rangos 4.9, 10.0, defecto 4.5): " . (\VALNORMAL\validaReal($numReal, 4.9, 10.3, 4.5)?"Correcto":"Error") . " (" . $numReal . ")";
    echo "<br>Validación número real (5.6, rangos 7.9, 10.0, defecto 4.5): " . (\VALNORMAL\validaReal($numReal, 7.9, 10.3, 4.5)?"Correcto":"Error") . " (" . $numReal . ")";
    echo "<br>Validación fecha (05/11/2026, por defecto 10/10/2026): " . (\VALNORMAL\validaFecha($ejFecha, "10/10/2026")?"Correcto":"Error") . " (" . $ejFecha . ")";
    $ejFecha = "01/01/1";
    echo "<br>Validación fecha (01/01/1, por defecto 10/10/2026): " . (\VALNORMAL\validaFecha($ejFecha, "10/10/2026")?"Correcto":"Error") . " (" . $ejFecha . ")";
    echo "<br>Validación hora (0:5:1, por defecto 18:55:10): " . (\VALNORMAL\validaHora($ejHora, "18:55:10")?"Correcto":"Error") . " (" . $ejHora . ")";
    $ejHora = "0:575:1";
    echo "<br>Validación hora (0:575:1, por defecto 18:55:10): " . (\VALNORMAL\validaHora($ejHora, "18:55:10")?"Correcto":"Error") . " (" . $ejHora . ")";
    echo "<br>Validación email (ana@gmail.com, por defecto pedrito12@gmail.com): " . (\VALNORMAL\validaEmail($ejEmail, "pedrito12@gmail.com")?"Correcto":"Error") . " (" . $ejEmail . ")";
    $ejEmail = "sadasdasdadsasda.es";
    echo "<br>Validación email (sadasdasdadsasda.es, por defecto pedrito12@gmail.com): " . (\VALNORMAL\validaEmail($ejEmail, "pedrito12@gmail.com")?"Correcto":"Error") . " (" . $ejEmail . ")";
    echo "<br>Validación cadena (hola mundo, con 10 de longitud y por defecto adios universo): " . (\VALNORMAL\validaCadena($ejCadena, 10, "adios universo")?"Correcto":"Error") . " (" . $ejCadena . ")";
    echo "<br>Validación cadena (hola mundo, con 7 de longitud y por defecto adios universo): " . (\VALNORMAL\validaCadena($ejCadena, 7, "adios universo")?"Correcto":"Error") . " (" . $ejCadena . ")";
    echo "<br>Validación expresión";
}