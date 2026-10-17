<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio", 
        "ENLACE" => "/index.php"],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/pruebas/cadenas.php",
    ],
    [
        "TEXTO" => "cadenas",
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("CADENAS", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    El ni&ntilde;o me ha escrito una carta.
    Qu&eacute; bonita.

<?php
}
