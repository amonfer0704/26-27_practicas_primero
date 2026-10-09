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
        "TEXTO" => "relacion2",
        "ENLACE" => "/aplicacion/relacion1/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "ejercicio2"
    ]
];
//Definición de la constante lanzamiento
const LANZAMIENTO = 1000;
//Creación del array resultadoWhile con clave valor
$resultadoWhile = [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0
];
//Variable auxiliar para el while
$num = 0;
while($num != LANZAMIENTO){
    $numRandom = mt_rand(1, 6);
    //Switch case para aumentar los valores de los arrays
    switch($numRandom){
        case 1: $resultadoWhile[1]++; break;
        case 2: $resultadoWhile[2]++; break;
        case 3: $resultadoWhile[3]++; break;
        case 4: $resultadoWhile[4]++; break;
        case 5: $resultadoWhile[5]++; break;
        case 6: $resultadoWhile[6]++; break;
        default: echo "Error con el número random";
    }
    $num++;
} 
//Creación del array resultadoFor
$resultadoFor = [];
//Llenar el array de números random
for($i = 0; $i < 6; $i++){
    array_push($resultadoFor, mt_rand(1, 6));
}
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 2 de la relación 1");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2", $barra);
cuerpo($resultadoFor, $resultadoWhile);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($resultadoFor, $resultadoWhile){
    $numCaras = 6;
?>
    <h2>LANZAMIENTO DE UN DADO</h2>
<?php
    //Vista del lanzamiento de dados en for
    for($i = 0; $i < $numCaras; $i++){
        echo "lanzamiento " . $i + 1 . " del dado " . $resultadoFor[$i] . "<br>";
    }
    echo "<br><br>";
    //Vista del lanzamiento de dados en while
    echo "lanzado el dado 1000 veces<br>";
    for($i = 0; $i < count($resultadoWhile); $i++){
        echo "el " . $i + 1 . " ha salido " . $resultadoWhile[$i + 1] . " con un porcentaje de " . $resultadoWhile[$i + 1] / 100 . "%<br>";
    }

}
