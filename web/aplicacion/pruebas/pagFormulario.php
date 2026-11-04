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
        "TEXTO" => "eje. Formulario",
    ]
];
//$usuario = getenv("MYSQL_USER");

//inicializadores
$datos = [
    "nombre" => "Vic",
    "precio" => 12
];
$errores = [];
if($_POST){
    $nombre = "";
    if(isset($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $nombre;
    }
}
//dibuja la plantilla de la vista
inicioCabecera("Página de formulario");
cabecera();
finCabecera();
inicioCuerpo("Pagina formulario", $barra);
cuerpo($datos, $errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($datos, $errores)
{
?>
   

<?php
    formulario($datos, $errores);
    function formulario(array $datos, array $errores){
        if($errores){
            echo '<div class="error"></div>';
            foreach($errores as $clave);
        }
    }
}
