<?php
/**
 * Ejercicio 1
 * Función cuentasVeces(). La función se encargará de añadir
 * en el array el primero número a la posición asociativa indicada
 * por la cadena
 * @param $array, $cadena, $num1, $num2
 * @return $numero, true|false
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool|int{
    if($cadena === "2daw" || $cadena === "primera") {
        return false;
    }
    if(isset($array[$cadena])){
        return true;
    }
    $num2++;
    $array[$cadena] = $num1;
    return false;

}

/**
 * Ejercicio 2
 * Función generarCadena(). Genera una cadena con la longitud que
 * se le especifica, devolverá false si el número es 0 o menor
 * @return string|false
 * @param num
 */
function generarCadena(int $num): string|false{
    $caracteres = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];
    if($num > 0){
        $cadena = "";
        for($i = 0; $i < $num; $i++){
            $cadena .= $caracteres[rand(0, count($caracteres) - 1)];
        }
        return $cadena;
    }
    return false;
}

/**
 * Ejercicio 3
 * Función operaciones(). El primer valor es el tipo de operación, 
 * los demás los operandos
 * @param numero
 */
function operaciones(int $tipoOperacion, float $num1, float $num2, float ...$argumentos): int{
    $resultado = 0;
    switch($tipoOperacion){
        case 1: {
            $resultado = $num1 + $num2;
            foreach($argumentos as $valor){
                $resultado = $resultado + $valor;
            }
            break;
        }
        case 2: {
            $resultado = $num1 - $num2;
            foreach($argumentos as $valor){
                $resultado = $resultado - $valor;
            }
            break;
        }
        case 3: {
            $resultado = $num1 * $num2;
            foreach($argumentos as $valor){
                $resultado = $resultado * $valor;
            }
            break;
        }
        default: {
            $numero = 0;
            $sumaPar = $num2;
            $sumaImpar = $num1;

            foreach($argumentos as $valor){
                $numero++;
                if($numero % 2 == 0){
                    $sumaPar = $sumaPar + $valor;
                }
                else{
                    $sumaImpar = $sumaImpar + $valor;
                }
            }
            $resultado = $sumaPar - $sumaImpar;
        }
    }
    return $resultado;
}

/**
 * Ejercicio 4
 * Función que recibe como parámetros tres números enteros y devuelve la 
 * suma de los tres valores en el primer parámetro y como resultado de la 
 * función el producto de los tres valores
 * @param param1, param2, param3
 * @return int
 */
function devuelve(int &$param1, int $param2 = 4, int $param3 = 5): int{
    $sumaValor = $param1 * $param2 * $param3;
    $param1 = $param1 + $param2 + $param3;
    return $sumaValor;
}

/**
 * Ejercicio 5
 * Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros
 * numéricos (entero) y que devuelven el resultado de la operación que indica su nombre sobre los
 * parámetros.
 * Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena
 * que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se
 * encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variable-
 * función para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve
 * false si la operación no es válida).
 * hacerOperacion(“resta”,3,1) //devuelve 3-1. No se llama directamente a la función resta, se
 * tiene una variable función para ello
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
function suma(int $num1, int $num2): int{
    return $num1 + $num2;
}
function resta(int $num1, int $num2): int{
    return $num1 - $num2;
}
function multiplicacion(int $num1, int $num2): int{
    return $num1 * $num2;
}
function hacerOperacion(string $op, int $num1, int $num2): int|string{
    $suma = "suma";
    $resta = "resta";
    $multiplicacion = "multiplicacion";
    $resultado = 0;
    if($op === $suma || $op === $resta || $op === $multiplicacion){
        return $op($num1, $num2);
    }
    return "false";
}

/**
 * Ejercicio 6
 * Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
 * devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
 * Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
 * flecha distintas que tu definas
 * llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)
 * Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)
 * @param integer $op1
 * @param integer $op2
 * @param callable $callback
 * @return integer
 */
function llamadaAFuncion(int $op1, int $op2, callable $callback): int{
    return $callback($op1, $op2);
}

/**
 * Ejercicio 7
 * Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
 * al que se indicará como función callback una función anónima que ordenará en orden descendente
 * según el número de caracteres de cada elemento.
 * $vector=array((“uno”,“grande”,“caminos”,”a”)
 * Ordenar($vector);//el vector debe quedar (“caminos”,”grande”,”uno”,”a”)
 * @param array $array
 * @return boolean
 */
function ordenar(array &$array): bool{
    $resultado = true;    
    if(count($array) === 0){
        $resultado = false;
    }
    else{
        foreach($array as $clave){
            if(!is_string($clave)){
                $resultado = false;
            }
        }
    }
    if($resultado){
        usort($array, function($a, $b){
            return mb_strlen($b) <=> mb_strlen($a);
        });
    }
    return $resultado;
}