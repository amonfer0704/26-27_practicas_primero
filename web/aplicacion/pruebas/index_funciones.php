<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include ("mis_funciones.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio", 
        "ENLACE" => "/index.php"],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php",
    ],
    [
        "TEXTO" => "index_funciones",
    ]
];
//$usuario = getenv("MYSQL_USER");
$numero = doble(3);
//comprobación 
if($numero === false){
    //hay un error lo resuelve
    $numero = 10;
}
if(($numero = doble($numero)) === false){
    exit;
}
//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("Index funciones", $barra);
cuerpo($numero);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
/**
 * función que me permite mostrar la vista
 * @return void
 */
function cuerpo(int $n)
{
    echo "el doble del numero es $n<br>";
    echo "el número $n es el doble de otro".PHP_EOL;


}
