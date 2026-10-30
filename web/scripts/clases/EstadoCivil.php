<?php
/**
 * Enumerado con las características soltero, casado, pareja y viudo con 
 * valores 10, 20, 30 y 40 respectivamente.
 */
enum EstadoCivil: int{
    case soltero = 10;
    case casado = 20;
    case pareja = 30;
    case viudo = 40;
    /**
     * Método descripción que devuelve el nombre del caso concreto
     *
     * @return string
     */
    function descripcion(): string{
        return $this->name;
    }

    /**
     * Método valor que devuelve el valor del caso concreto
     *
     * @return integer
     */
    function valor(): int{
        return $this->value;
    }

    /**
     * Método estático casos que devuelve un array con todos los casos
     */
    static function casos(): array{
        $miArray = self::cases();
        return $miArray;
    }

}