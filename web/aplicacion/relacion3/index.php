<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include("libreria.php");
//controlador

//$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("Relación 3");
cabecera();
finCabecera();
inicioCuerpo("Ejercicios de la relación 3");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>
    <h1>Ejercicio 1</h1>
<?php
    $vector = array();
    $numero = 0;
    if(cuentaVeces($vector, "Posición1", 2, $numero)){
        echo "La primera ha ido mal";
    }
    else{
        echo "La primera ha ido bien";   
    }
    echo "<br>";
    if(cuentaVeces($vector, "primera", 7, $numero)){
        echo "La segunda ha ido mal";
    }
    else{
        echo "La segunda ha ido bien";   
        
    }
    
    echo "<br>";
    foreach($vector as $clave => $valor){
        echo "Valor: " .$valor . " en la posición " . $clave . "<br>";
    }
    echo "Se ha llamado a cuentaVeces " . $numero . " veces<br>";
    ?>
    <h1>Ejercicio 2</h1>
    <?php
    //Ejercicio 2
    $num = 10;
    if(generarCadena($num) === false){
        echo "Error con la cadena, el número no puede ser 0";
    }
    else{
        echo generarCadena($num);
    }

    ?>
    <h1>Ejercicio 3</h1>
    <?php
    echo "El resultado la suma de 2, 3, 4, 5, 6, 7: " . operaciones(1, 2, 3, 4, 5, 6, 7) . "<br>";
    echo "El resultado la resta de 20, 3, 4, 5, 6, 7: " . operaciones(2, 20, 3, 4, 5, 6, 7) . "<br>";
    echo "El resultado la multiplicación de 2, 3, 4, 5, 6, 7: " . operaciones(3, 2, 3, 4, 5, 6, 7) . "<br>";
    echo "El resultado la suma de pares e impares de 2, 3, 4, 5, 6, 7: " . operaciones(5, 2, 3, 4, 5, 6, 7);
}
