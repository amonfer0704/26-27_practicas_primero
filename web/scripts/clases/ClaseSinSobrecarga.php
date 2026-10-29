<?php
/**
 * clase normal sin sobrecarga
 */
class ClaseSinSobrecarga{
    public int $numero = 10;

    /**
     * Método mágico para control de la sobrecarga
     */
    public function __set(string $name, mixed $value):void
    {
        throw new Exception('La propiedad $name no existe');
    }

    public function __get(string $name): mixed{
        throw new Exception('La propiedad $name no existe');
    }

    public function __isset(string $name): bool
    {
        return false;
    }

    public function __unset(string $name): void{
        throw new Exception('La propiedad $name no existe');
    }
}