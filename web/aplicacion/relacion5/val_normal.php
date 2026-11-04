<?php 
namespace VALNORMAL;

/**
 * 
 * Función que comprueba que $var contiene un entero cuyo valor está entre
 * $min y $max. En $var se devuelve el número entero saneado (en caso de no cumplir 
 * las condiciones asigna a $var el valor $defecto). La función devuelve true si 
 * es correcto y false en caso contrario.
 * @param int $var
 * @param int $min
 * @param int $max
 * @param int $defecto
 * @return bool
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool{
    $resultado = true;
    if($var < $min || $var > $max){
        $var = $defecto;
        $resultado = false;
    }
    return $resultado;
}

/**
 * 
 * Función que comprueba que $var contiene un entero cuyo valor está entre
 * $min y $max. En $var se devuelve el número entero saneado (en caso de no cumplir 
 * las condiciones asigna a $var el valor $defecto). La función devuelve true si 
 * es correcto y false en caso contrario.
 * @param int $var
 * @param int $min
 * @param int $max
 * @param int $defecto
 * @return bool
 */
function validaReal(float &$var, float $min, float $max, float $defecto): bool{
    $resultado = true;
    if($var < $min || $var > $max){
        $var = $defecto;
        $resultado = false;
    }
    return $resultado;
}

/**
 * 
 * Función que comprueba que $var contiene una fecha correcta en el formato dd/mm/aaaa. 
 * En $var se devuelve la fecha saneada (2 cifras para dia y mes y cuatro para año- 
 * ej fecha 1/2/2023 es válida aunque se sanea y se convierte en 01/02/2023). 
 * En caso de no cumplir las condiciones devuelve $defecto en $var. La función 
 * devuelve true si es correcta y false en caso contrario.
 * @param string $var
 * @param string $defecto
 * @return bool
 */
function validaFecha(string &$var, string $defecto): bool{
    $resultado = true;
    $fechaFormateada = new \DateTime($var);
    if(!$fechaFormateada){
        $var = $defecto;
        $resultado = false;
    }
    $aux = $fechaFormateada->format("d/m/Y");
    if($aux !== $var){
        $var = $defecto;
        $resultado = false;
    }
    return $resultado;
}

/**
 * Función que comprueba que $var contiene una hora correcta en el formato hh:mm:ss. 
 * En $var se devuelve la hora saneada (2 cifras para hora, min, segundos - 
 * Ej 0:5:1, hora valida aunque se sanea y se convierte a (00:05:01). En caso 
 * de no cumplir las condiciones devuelve $defecto en $var. La función
 * devuelve true si es correcta y false en caso contrario
 * @param string $var
 * @param string $defecto
 * @return bool
 */
function validaHora(string &$var, string $defecto): bool{
    $resultado = true;
    $fechaFormateada = \DateTime::createFromFormat("H:M:s", $var);
    if(!$fechaFormateada){
        $var = $defecto;
        $resultado = false;
    }
    $aux = $fechaFormateada->format("h:M:s");
    if($aux !== $var){
        $var = $defecto;
        $resultado = false;
    }
    return $resultado;
}

/**
 * function validaEmail. Esta función comprueba que $var contiene un email correcto en el formato 
 * aaaaa@bbbb.ccc. En $var se devuelve el email saneado (en caso de no cumplir las condiciones devuelve $defecto). 
 * La función devuelve true si es correcto y false en caso contrario.
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaEmail(string &$var, string $defecto): bool{
    $resultado = true;
    $cadena = "[A-Za-z]+@[A-Za-z]+\.[A-Za-z]{3}";
    if(!preg_match($cadena, $var)){
        $var = $defecto;
        $resultado = false;
    }
    $var = mb_strtolower($var);
    return $resultado;
}

/**
 * función que comprueba que $var contiene una cadena de longitud máxima $longitud. En caso de no
 * cumplir las condiciones se asigna a $var el valor $defecto. La función devuelve true si es
 * correcto y false en caso contrario
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean
 */
function validaCadena(string &$var, int $longitud, string $defecto): bool{
    $resultado = true;
    if(mb_strlen($var) > $longitud){
        $var = $defecto;
        $resultado = false; 
    }
    return $resultado;
}

function validaExpresion(string &$var, string $expresion, string $defecto): bool{
    $resultado = true;
    if(!preg_match($expresion, $var)){
        $var = $defecto;
        $resultado = false;
    }
    return $resultado;
}