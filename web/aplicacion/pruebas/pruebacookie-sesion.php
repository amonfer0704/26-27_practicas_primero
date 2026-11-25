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
        "ENLACE" => "/aplicacion/pruebas/index.php",
    ],
    [
        "TEXTO" => "prue cookie y sesiones",
    ]
];
//$usuario = getenv("MYSQL_USER");

//setcookie("numero", mt_rand(1, 100), time() + 60 * 60 * 24 * 2);
//$valor = $_COOKIE["numero"];
$valor = 0;
session_start();

$_SESSION["nombre"] = "Vicente";
//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("prueba Imagen", $barra);
cuerpo($valor);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(int $valor)
{
    echo "Leída la cookie con valor " . $valor; 
?>
    
<?php
}
