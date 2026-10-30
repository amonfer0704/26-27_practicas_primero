<?php
/**
 * clase sobrecargada con el siguiente comportamiento
 * Si la propiedad empieza por m la doy por buena
 * Una propiedad sobrecargada siempre tendrá el valor 234
 */
class ClaseSobrecargada{
    public int $numero = 10;

    /**
     * Método mágico para control de la sobrecarga
     */
    public function __set(string $name, mixed $value):void
    {
        throw new Exception('La propiedad $name no existe');
    }

    public function __get(string $name): mixed{
        if(mb_substr(mb_strtoupper($name), 0, 1) !== 'M'){
            throw new Exception('La propiedad no empieza por M');
        }
        return 234;
    }

    public function __isset(string $name): bool
    {
        return mb_substr(mb_strtoupper($name), 0, 1) !== 'M';

    }

    public function __unset(string $name): void{
        throw new Exception('La propiedad $name no existe');
    }
}