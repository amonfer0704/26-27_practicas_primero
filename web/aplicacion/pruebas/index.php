<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("PASO PARAMETROS");
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
