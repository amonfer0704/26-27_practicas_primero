<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "relacion1",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "ejercicio1"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    //Variables inicializadas en binario, octal y hexadecimal
    $numBinario = 0b10011;
    $numOctal = 0755;
    $numHexadecimal = 0x12A;
?>
    <h2>Funciones matemáticas</h2>
    <ul>
        <!--Funcion con round y dos decimales -->
        <li>round(3.14159, 2) = <?php echo round(3.14159, 2)?></li>
        <!--Funcion con round sin decimales -->
        <li>round(7.5) = <?php echo round(7.5)?></li>
        <!--Funcion con floor (redondear hacia abajo) -->
        <li>floor(7.9) = <?php echo floor(7.9)?></li>
        <!--Funcion con pow (potencia)-->
        <li>pow(2, 10) = <?php echo pow(2, 10)?></li>
        <!--Funcion con sqrt (raiz cuadrada) -->
        <li>sqrt(144) = <?php echo sqrt(144)?></li>
        <!--Funcion con abs (valor absoluto) -->
        <li>abs(-25) = <?php echo abs(-25)?></li>
        <!--Funcion con max (elegir valor más alto) -->
        <li>max(3, 7, 2) = <?php echo max(3, 7, 2)?></li>
    </ul>
    <h2>Cambios de base</h2>
    <ul>
        <!--Funcion con dechex que cambia de entero a decimal -->
        <li>Entero a hexadecimal (255): <?php echo dechex(255) ?></li>
        <!--Funcion base_convert que cambia la base de 4 a 8 -->
        <li>De base 4 a base 8: base_convert("123", 4, 8) = <?php echo base_convert("123", 4, 8) ?></li>
    </ul>
    <ul>
        <!--Funcion con decbin que cambia un número binario a decimal -->
        <li>$numBinario = 0b10011, decimal: <?php echo $numBinario ?>, en binario: <?php echo decbin($numBinario) ?></li>
        <!--Funcion con decoct que cambia un número octal a decimal -->
        <li>$numOctal = 0755, decimal: <?php echo $numOctal ?>, en octal: <?php echo decoct($numOctal) ?></li>
        <!--Funcion con dechex que cambia un número de hexadecimal a decimal -->
        <li>$numHexadecimal = 0x12A, decimal: <?php echo $numHexadecimal ?>, en hexadecimal: <?php echo dechex($numHexadecimal) ?></li>
    </ul>
<?php
}
