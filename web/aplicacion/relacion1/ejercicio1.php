<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    $numBinario = 0b10011;
    $numOctal = 0755;
    $numHexadecimal = 0x12A;
?>
    <h2>Funciones matemáticas</h2>
    <ul>
        <li>round(3.14159, 2) = <?php echo round(3.14159, 2)?></li>
        <li>round(7.5) = <?php echo round(7.5)?></li>
        <li>floor(7.9) = <?php echo floor(7.9)?></li>
        <li>pow(2, 10) = <?php echo pow(2, 10)?></li>
        <li>sqrt(144) = <?php echo sqrt(144)?></li>
        <li>abs(-25) = <?php echo abs(-25)?></li>
        <li>max(3, 7, 2) = <?php echo max(3, 7, 2)?></li>
    </ul>
    <h2>Cambios de base</h2>
    <ul>
        <li>Entero a hexadecimal: <?php echo dechex(255) ?></li>
        <li>De base 4 a base 8: base_convert("123", 4, 8) = <?php echo base_convert("123", 4, 8) ?></li>
    </ul>
    <ul>
        <li>$numBinario = 0b10011, decimal: <?php echo $numBinario ?>, en binario: <?php echo decbin($numBinario) ?></li>
        <li>$numOctal = 0755, decimal: <?php echo $numOctal ?>, en octal: <?php echo decoct($numOctal) ?></li>
        <li>$numHexadecimal = 0x12A, decimal: <?php echo $numHexadecimal ?>, en hexadecimal: <?php echo dechex($numHexadecimal) ?></li>
    </ul>
<?php
}
