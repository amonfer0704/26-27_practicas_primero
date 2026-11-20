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
        "TEXTO" => "prueba imagen",
    ]
];
//$usuario = getenv("MYSQL_USER");
$nombreFichero = RUTABASE . "/imagenes/pruebaimagen.jpg";
$crear = false;

if($crear){
    //Genero la imagen
    $imagen = imagecreatetruecolor(250, 250);
    //Genero un color
    $color = imagecolorallocate($imagen, 0, 0, 255);
    //Rellena un rectángulo
    imagefilledrectangle($imagen, 10, 10, 190, 190, $color);

    //Dibujo una línea
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imageline($imagen, 10, 10, 100, 10, $color);
   
    imagejpeg($imagen, $nombreFichero);

}

if(isset($_GET["descargar"])){
    $imagen = imagecreatefromjpeg($nombreFichero);
    $color = imagecolorallocate($imagen, 255, 255, 255);
    imagestring($imagen, 2, 10, 150, "marca agua", $color);
    header('Content-Disposition:attachment;filename= "imagen.jpg"');
    imagejpeg($imagen);
    exit;
}
//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("prueba Imagen", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <img src="/imagenes/pruebaimagen.jpg" alt="Imagen">
    <a href="?descargar">Descargar</a>
<?php
}
