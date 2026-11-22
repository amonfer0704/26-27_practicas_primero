<?php 

/**
 * Clase Punto que representa un punto de la imagen
 */
class Punto{

    /**
     * Posibles colores donde la clave es el nombre en inglés, nombre es en español y 
     * rgb son los valores
     */
    public const COLORES = [
        "black" => ["nombre" => "negro", "rgb" =>[0,0,0]],
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]],
        "blue" => ["nombre" => "azul", "rgb" => [0, 0, 255]]
    ];

    /**
     * Posibles grosores, la clave es el valor que se guarda y el texto lo que se
     * muestra
     */
    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];
    /**
     * Propiedades de instancia
     *
     * @var integer coordenadaX
     * @var integer coordenadaY
     * @var string color
     * @var int grosor
     */
    private int $_coordenadaX;
    private int $_coordenadaY;
    private string $_color;
    private int $_grosor;

    /**
     * Constructor al que se le pasan las propiedades
     *
     * @param integer $coordenadaX
     * @param integer $coordenadaY
     * @param string $color
     * @param integer $grosor
     */
    public function __construct(int $coordenadaX, int $coordenadaY, string $color, int $grosor)
    {
        if(!$this->setCoordenadaX($coordenadaX))
            throw new Exception("Error con la validación de coordenadas X");
        if(!$this->setCoordenadaY($coordenadaY))
            throw new Exception("Error con la validación de coordenada Y");
        if(!$this->setColor($color)){
            throw new Exception("El color seleccionado no es una de las opciones");
        }
        if(!$this->setGrosor($grosor))
            throw new Exception("El grosor seleccionado no es una opción");
    }

    /**
     * Setters y Getters con validación de todas las variables
     *
     * @param integer $coordenadaX
     * @return boolean
     */
    public function setCoordenadaX(int $coordenadaX): bool{
        $resultado = true;
        if(!validaEntero($coordenadaX, 0, 20000, 0))
            $resultado = false;
        else 
            $this->_coordenadaX = $coordenadaX;
        return $resultado;
    }

    public function getCoordenadaX(): int{
        return $this->_coordenadaX;
    }

    public function setCoordenadaY(int $coordenadaY): bool{
        $resultado = true;
        if(!validaEntero($coordenadaY, 0, 20000, 0))
            $resultado = false;
        else
            $this->_coordenadaY = $coordenadaY;
        return $resultado;
    }

    public function getCoordenadaY(): int{
        return $this->_coordenadaY;
    }

    public function setColor(string $color): bool{
        $resultado = true;
        if(!array_key_exists($color, self::COLORES)){
            $resultado = false;
        }
        else 
            $this->_color = $color;
        return $resultado;
    }

    public function getColor(): string{
        return $this->_color;
    }

    public function setGrosor(int $grosor): bool{
        $resultado = true;
        if(!array_key_exists($grosor, self::GROSORES)){
            $resultado = false;
        }
        else 
            $this->_grosor = $grosor;
        return $resultado;
    }

    public function getGrosor(): int{
        return $this->_grosor;
    }

    /**
     * Métodos mágicos para que no se creen propiedades dinámicas
     *
     * @param mixed $name
     * @param [type] $value
     */
    public function __set(mixed $name, $value)
    {
        throw new \Exception("La propiedad $name no existe");
    }
    public function __get(mixed $name)
    {
        throw new \Exception("La propiedad $name no existe");
    }
    public function __isset(mixed $name)
    {
        throw new \Exception("La propiedad $name no existe");
    }
    public function __unset(mixed $name)
    {
        throw new \Exception("La propiedad $name no existe");
    }
}