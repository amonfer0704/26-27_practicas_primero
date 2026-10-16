<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "relacion2",
        "ENLACE" => "/aplicacion/relacion2/index.php",
        "ADICIONAL" => ">>"
    ],
    [
        "TEXTO" => "ejercicio1"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 1 de la relación 2");
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
    
?>
    
<?php
    //Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras minúsculas, letras mayúsculas y números)
    //a) A partir de un array en el que están todos los caracteres posibles que cumplen la condición. (tienes que rellenar el array con todos los caracteres validos)
    $caracteres = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];
    $cadenaAleatoria = "";
    for($i = 0; $i < 20; $i++){
        $cadenaAleatoria .= $caracteres[rand(0, count($caracteres) - 1)];
    }
    echo $cadenaAleatoria;

    //b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos caracteres que no lo cumplan).
    echo "<br>";
    $cadenaAleatoria2 = "";
    $numAleatorio = 0;
    for($i = 0; $i < 20; $i++){
        $numAleatorio = rand(48, 122);
        if (($numAleatorio <= 57) || ($numAleatorio >= 65 && $numAleatorio <= 90) || ($numAleatorio >= 97 && $numAleatorio <= 122)){
            $cadenaAleatoria2 .= chr($numAleatorio);
        }

    }
    echo $cadenaAleatoria2;
}