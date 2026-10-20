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