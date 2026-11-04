<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
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
        "TEXTO" => "index",
    ]
];
//$usuario = getenv("MYSQL_USER");


//dibuja la plantilla de la vista
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("index", $barra);
cuerpo();//llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
<?php

}
