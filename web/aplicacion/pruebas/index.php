<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
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
        "TEXTO" => "eje. basicas",
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>
    Pruebas
    <br><br>
    <a href="basicas.php">Funcionamiento básico</a> 
    <a href="pasopar.php">Comunicacion controlador-vista</a>
    <a href="./array.php">Arrays</a>

<?php
}
