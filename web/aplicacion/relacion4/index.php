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
        "ENLACE" => "/aplicacion/relacion4/index.php",
    ],
    [
        "TEXTO" => "index",
    ]
];

$violin = new InstrumentoViento("roble", 2);
// $guitarra = new InstrumentoBase("Intrumento de cuerda pero clásica");
// $bateria = new InstrumentoBase("Intrumento de percusión", 12);

//$usuario = getenv("MYSQL_USER");


//dibuja la plantilla de la vista
inicioCabecera("Relación 4");
cabecera();
finCabecera();
inicioCuerpo("index", $barra);
cuerpo($violin);//$violin, $guitarra, $bateria);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($violin)//$violin, $guitarra, $bateria
{
?>
    <h1>Ejercicio 1</h1>
<?php

    // try{
    //     echo "Violín: $violin"; 
    //     echo "<br>Guitarra: $guitarra";
    //     echo "<br>Batería: $bateria";

    //     $bateria -> envejecer();
    //     echo "<br>Batería: $bateria";
    // }
    // catch(Exception $e){
    //     echo "<br>Error: $e";
    // }
    echo "<br>Es una clase abstracta por lo que no puedo crear objetos";
    ?>
    <h1>Ejercicio 2</h1>
    <?php
    echo "No se puede probar todavía, más adelante se implementará";
    ?>
    <h1>Ejercicio 3</h1>
    <?php
    try{
        echo "Violín: $violin"; 
    }
    catch(Exception $e){
        echo "<br>Error: $e";
    }

}
