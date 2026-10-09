<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 7 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
?>
    <!--Mostrar la fecha actual en el formato “d/m/Y”-->
    <p>Formato “d/m/Y” = <?php echo date("d/m/Y")?></p>
    <!--Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”-->
    <p>Formato “dia d, mes mmmm, año yyyy, dia de la semana dd” = <?php echo "Día " . date("d") . ", mes " . date("m") . ", año " . date("Y") . ", dia de la semana " . date("l")?></p>
<!--Mostrar la hora actual en el formato “hh:mm:ss”-->
    <p>Formato “hh:mm:ss” = <?php echo date("H:i:s")?></p>
<!--Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45-->
<?php
    $fecha = new DateTime("29-03-2024 12:45");
    echo "1. " . $fecha->format("d/m/Y") . "<br>";
    echo "2. Día " . $fecha->format("d") . ", mes " . $fecha->format("m") . ", año " . $fecha->format("Y") . ", día de la semana " . $fecha->format("l");
    echo "<br>3. " . $fecha->format("H:i:s") . "<br>";
    //Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
    $otraFecha = new DateTime("29-03-2024 12:45");
    $otraFecha->modify("-12 days");
    $otraFecha->modify("-4 hours");
    echo "1. " . $otraFecha->format("d/m/Y");
    echo "2. Día " . $otraFecha->format("d") . ", mes " . $otraFecha->format("m") . ", año " . $otraFecha->format("Y") . ", día de la semana " . $otraFecha->format("l");
    echo "<br>3. " . $otraFecha->format("H:i:s") . "<br>";

}
