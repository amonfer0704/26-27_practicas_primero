<?php

class IntrumentoBase{
    /**
     * variables de instancia
     *
     * @var string descripcion
     * @var int edad
     */
    private string $descripcion;
    protected int $edad;
    protected static int $totalInstancias = 0;
    protected int $numInstancia = 0;

    /**
     * Constructor al que se le pasan dos parámetros, aunque uno de ellos tiene valor por defecto
     *
     * @param string $_descripcion
     * @param integer $_edad
     */
    public function __construct(string $_descripcion, int $_edad = 10)
    {
        $this->descripcion = $_descripcion;
        $this->edad = $_edad;
        $this->numInstancia = self::$totalInstancias++;
        self::$totalInstancias++;
    }

    /**
     * Getters y setters
     *
     * @return string
     */
	public function getDescripcion() : string {
		return $this->descripcion;
	}

	public function setDescripcion(string $value) {
		$this->descripcion = $value;
	}

	public function getEdad() : int {
		return $this->edad;
	}

	public function setEdad(int $value) {
		$this->edad = $value;
	}

    /**
     * Método sonido que devuelve un string con el sonido que haría un instrumento
     *
     * @return string
     */
    public function sonido(): string {
        return "Brrrruum";
    }

    /**
     * Método afinar que devuelve una cadena de pasos que hay que seguir para afinar un instrumento
     *
     * @return string
     */
    public function afinar(): string{
        return "Paso 1. Ver si está afinada <br>Paso 2. Si está desafinada, instala una aplicación para afinarla. <br>Paso 3. Sigue los pasos de la aplicación. <br>Paso 4. Ya está afinada";
    }

    /**
     * Método envejecer que le suma un año a la edad del instrumento
     *
     * @return void
     */
    public function envejecer(): void{
        $this->edad++;
    }

    public function __toString(): string
    {
        return "instrumento con descripcion " . $this->descripcion . ", instancia " . $this->numInstancia . " de un total de " . self::$totalInstancias . ". Tiene " . $this->edad . " años. La clase es " . get_class($this);
    }

}