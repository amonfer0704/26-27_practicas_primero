<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio", 
        "ENLACE" => "/index.php",
        "ADICIONAL" => ">>"],
    [
        "TEXTO" => "index"
    ],
    [
        "TEXTO" => "index",
        "ADICIONAL" => "&copy;&copy;"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Mi aplicacion");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION INDEX", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {
    ?>
    <!--Esto es un comentario HTML-->
    <?php
    //Esto va en el head y es un comentario de PHP
}

//vista
function cuerpo()
{
?>
    <br><br>
    <a href="/aplicacion/pruebas/index.php">Pruebecilla</a><br>
<?php
}
