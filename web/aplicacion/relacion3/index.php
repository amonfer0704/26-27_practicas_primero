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
    
    ?>
    <br><br>
    <h1>Ejercicio 4</h1>
    <?php
    $valor = 10;
    echo "Con los tres parámetros: " . devuelve($valor, 20, 30) . " y el valor del primero es: " . $valor;
    echo "<br>Con el primer parámetro únicamente: " . devuelve($valor) . " y el valor del primero es: " . $valor;
    echo "<br>Con el primer y segundo parámetro: " . devuelve($valor, 20) . " y el valor del primero es: " . $valor;
    echo "<br>Con el primer y el tercer parámetro: " . devuelve($valor, param3: 30) . " y el valor del primero es: " . $valor;

    ?>
    <br><br>
    <h1>Ejercicio 5</h1>
    <?php
    echo "Operaciones<br>";
    echo "Suma: " . hacerOperacion("suma", 3, 4);
    echo "<br>Resta: " . hacerOperacion("resta", 10, 5);
    echo "<br>Multiplicación: " . hacerOperacion("multiplicacion", 2, 2);
    echo "<br>Error: " . hacerOperacion("dividir", 10, 5);

    ?>
    <br><br>
    <h1>Ejercicio 6</h1>
    <?php
    echo "Suma con la función: " . llamadaAFuncion(1,2,fn($a,$b)=>$a+$b);
    echo "<br>Resta con la función: " . llamadaAFuncion(5,2,fn($a,$b)=>$a-$b);
    echo "<br>Multiplicación con la función: " . llamadaAFuncion(2,2,fn($a,$b)=>$a*$b);

    $suma = function(int $num1, int $num2):int{
        return $num1 + $num2;
    };
    $resta = function(int $num1, int $num2):int{
        return $num1 - $num2;
    };
    $multiplicacion = function(int $num1, int $num2):int{
        return $num1 * $num2;
    };

    echo "<br>Suma: " . llamadaAFuncion(1, 2, $suma);
    echo "<br>Resta: " . llamadaAFuncion(10, 5, $resta);
    echo "<br>Multiplicacion: " . llamadaAFuncion(2, 2, $multiplicacion);

    ?>
    <br><br>
    <h1>Ejercicio 7</h1>
    <?php
    $vector = array("uno", "grande", "caminos", "a");
    if(ordenar($vector)){
        for($i = 0; $i < count($vector); $i++){
        echo $vector[$i] . " ";
        }
    }
    else{
        echo "No se ha podido ordenar el array";
    }
    
}
