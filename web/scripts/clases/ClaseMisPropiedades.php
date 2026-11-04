<?php
/**
 * Clase ClaseMisPropiedades donde se define una propiedad privada llamada
 * $_propiedades. Se debe permitir añadir en tiempo de ejecución
 * cualquier nueva propiedad a una instancia.
 */
class ClaseMisPropiedades implements Iterator{
    private array $_propiedades = [];
    public mixed $propPublica;
    private mixed $_propPrivada = 25;
    private int $posicion = 0;
    private array $elementos = [];

    /**
     * Métodos mágicos
     */
    public function __set(string $nombre, mixed $valor): void{
        if(mb_strlen($nombre) === 0){
            throw new Exception("El nombre no puede estar vacío");
        }
        if($nombre === "_propPrivada"){
            throw new Exception("La propiedad es privada");
        }
        $this->_propiedades[$nombre] = $valor;
    }

    public function __get(string $nombre): mixed{
        if(!array_key_exists($nombre, $this->_propiedades)){
            throw new Exception("No existe la propiedad $nombre");
        }
        return $this->_propiedades[$nombre];
    }

    public function __isset(string $nombre): bool{
        return isset($this->_propiedades[$nombre]);
    }

    public function __unset(string $nombre): void{
        unset($this->_propiedades[$nombre]);
    }
    public function rewind(): void{
        $this->elementos = [];
        foreach($this->_propiedades as $clave => $valor){
            $this->elementos["oi_" . $clave] = $valor;
        }
        $this->elementos["oi_propPublica"] = $this->propPublica;
        $this->elementos["oi__propPrivada"] = $this->_propPrivada;
        $this->posicion = 0;
    }

    public function current(): mixed{
        return array_values($this->elementos)[$this->posicion];
    }

    public function key(): mixed{
        return array_keys($this->elementos)[$this->posicion];
    }

    public function next():void{
        $this->posicion++;
    }

    public function valid(): bool{
        return $this->posicion < count($this->elementos);
    }
}