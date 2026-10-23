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
        "TEXTO" => "ejercicio4"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 4 de la relación 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    
?>
    
<?php
    /*Tengo unas variables con valores 17.5 (float), 379987.24 (float)
    Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -
    379.987,24-" (usar number format para obtener el formateo de los números, los números se
    muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe
    aparecer el espacio))
    */
    $var1 = 17.5;
    $var2 = 379987.24;
    echo "-". str_pad(number_format($var1, 1, ","), 15, "0", STR_PAD_LEFT) . "-";
    echo "<br>";
    echo "-" . str_repeat("&nbsp;", 15 - mb_strlen($var2)). $var2 . "-";

}