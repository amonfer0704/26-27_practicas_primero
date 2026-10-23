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
        "TEXTO" => "ejercicio5"
    ]
];
//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Ejercicio 5 de la relación 2");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(){
    
?>
    
<?php

    /**
     * Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
     * aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
     *  de correo electrónico (formato aaaa@aaaa.aa).
     *  Define expresiones regulares apropiadas para localizar los distintos elementos creados
     *  (etiqueta, numero y dirección de email) en la cadena.
     *  Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
     *  función preg_match.
     */
    $cadena = <<<END
        Bienvenido a Docker.<br>
        Aquí hay un html &lt;a&gt;Inicio&lt;/a&gt; &lt;h3&gt;Bienvenido&lt;/h3&gt;<br>
        Se han vendido 1984 unidades a 45 euros<br>
        Escribe tu correo corporativo de esta forma: amonfer0704@g.educaand.es o tu correo personal: correoinexistente@gmail.com<br><br><br>
    END;
    echo $cadena;
    $expHtml = '/&lt;[^&]+&gt;/';
    $expNum = '/[0-9]+/';
    $expCorreo = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,}/';
    //html
    $posicionHtml = 0;
    $resultadoHtml = "";
    preg_match_all($expHtml, $cadena, $resultadoHtml, PREG_OFFSET_CAPTURE);
    foreach($resultadoHtml[0] as $resultado){
        $elemento = $resultado[0];
        $posicionHtml = $resultado[1];
        echo "HTML " . $elemento . " encontrado en la posición " . $posicionHtml . "<br>";
    }

    //Números
    $posicionNumeros = 0;
    $resultadoNumeros = "";
    preg_match_all($expNum, $cadena, $resultadoNumeros, PREG_OFFSET_CAPTURE);
    foreach($resultadoNumeros[0] as $resultado){
        $elemento = $resultado[0];
        $posicionNumeros = $resultado[1];
        echo "Número " . $elemento . " encontrado en la posición " . $posicionNumeros . "<br>";
    }

    //Correos
    $posicionCorreo = 0;
    $resultadoCorreo = "";
    preg_match_all($expCorreo, $cadena, $resultadoCorreo, PREG_OFFSET_CAPTURE);
    foreach($resultadoCorreo[0] as $resultado){
        $elemento = $resultado[0];
        $posicionCorreo = $resultado[1];
        echo "Correo " . $elemento . " encontrado en la posición " . $posicionCorreo . "<br>";
    }
}