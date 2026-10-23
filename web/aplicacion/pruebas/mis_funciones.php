<?php

const MIA = 56;
/**
 * Función que devuelve un número
 * Si el número es menor de 10 se dará un error
 * 
 * @param integer $num Numero al que aplicar el doble
 * @return integer|false devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false{
    //$num es mejor de 10, consideramos que hay un error
    if($num < 10)
        return false;
    return 2* $num;
}
function variosParametros(int $param1, string $param2= "", float $param3 = 10.0): int|float{
    // if(is_int($param2))
    //     $param2 = intval($param2);
    // else
    //     $param2 = 0;

    static $cadena = "";
    $cadena .= $param2;
    $param2 = is_int($param2)?$param2 = intval($param2):$param2 = 0;
    $param3 += $param1 + $param2;    
    return $param3;
}

function masParametros(int $num1, int $num2, ... $otrasVariables): int{
    $suma = $num1 + $num2;
    foreach($otrasVariables as $resto){
        $suma += $resto;
    }
    return $suma;
}

//function suma();