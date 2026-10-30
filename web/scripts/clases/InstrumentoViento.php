<?php
class InstrumentoViento extends InstrumentoBase{    
    protected string $material;
    
    public function __construct(string $_material = "madera", int $_edad = 15)
    {
        parent::__construct("instrumento de viento", $_edad);
        $this->material = $_material;
        $this->edad = $_edad;
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
    
    public function sonido(): string {
        return "Shhhh";
    }

    public final function afinar():string {
        return "Sopla fuerte hasta afinar el instrumento de viento";
    }

    #[Override]
    public function __toString(): string
    {
        return parent::__toString() . "<br>Instrumento de material " . $this->material;
    }
}