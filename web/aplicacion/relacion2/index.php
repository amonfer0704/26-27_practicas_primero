<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Relación 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicios de la relación 2");
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
    <a href="/aplicacion/relacion2/ejercicio1.php">Ejercicio 1</a>
    <a href="/aplicacion/relacion2/ejercicio2.php">Ejercicio 2</a>
    <a href="/aplicacion/relacion2/ejercicio3.php">Ejercicio 3</a>
    <a href="/aplicacion/relacion2/ejercicio4.php">Ejercicio 4</a>
    <a href="/aplicacion/relacion2/ejercicio5.php">Ejercicio 5</a>

<?php
}
