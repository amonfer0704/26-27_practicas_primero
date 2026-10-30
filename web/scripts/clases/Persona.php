<?php
/**
 * Clase persona con propiedades nombre, fecha_nacimiento, domicilio
 * localidad y estado
 */
class Persona{
    private string $nombre;
    private string $fecha_nacimiento;
    private string $domicilio;
    private string $localidad;
    private EstadoCivil $estado;

    /**
     * Constructor privado  al que no se indica ningún parámetro y que rellena las propiedades
     * con valores 
     */
    private function __construct()
    {
        $nombre = "prueba";
        $fecha_nacimiento = "01/01/2000";
        $domicilio = "carrera 12";
        $localidad = "antequera";
        $estado = EstadoCivil::soltero;
    }

    /**
     * Constructor estático que recibe parámetros para todas las propiedades
     *
     * @param string $_nombre
     * @param string $_fecha_nacimiento
     * @param string $_domicilio
     * @param string $_localidad
     * @param EstadoCivil $_estado
     * @return static
     */
    public static function registrarPersona(string $_nombre, string $_fecha_nacimiento, string $_domicilio, string $_localidad, EstadoCivil $_estado): static
    {
        $persona = new Static();
        $persona->nombre = $_nombre;
        $persona->fecha_nacimiento = $_fecha_nacimiento;
        $persona->domicilio = $_domicilio;
        $persona->localidad = $_localidad;
        $persona->estado = $_estado;
        return $persona;
    }

    /**
     * Getters y setters
     */

    public function getNombre(): string {return $this->nombre;}

    public function setNombre(string $nombre): void {$this->nombre = $nombre;}
    public function getFechaNacimiento(): string {return $this->fecha_nacimiento;}
    public function setFechaNacimiento(string $fecha_nacimiento): void {$this->fecha_nacimiento = $fecha_nacimiento;}
    public function getDomicilio(): string {return $this->domicilio;}
    public function setDomicilio(string $domicilio): void {$this->domicilio = $domicilio;}
    public function getLocalidad(): string {return $this->localidad;}
    public function setLocalidad(string $localidad): void {$this->localidad = $localidad;}
    public function getEstadoCivil(): EstadoCivil {return $this->estado;}
    public function setEstadoCivil(EstadoCivil $estado): void {$this->estado = $estado;}

    /**
     * Método toString que devuelve la cadena "nombre es una persona estado nacida en 
     * fecha_nacimiento y que vive en localidad"
     */
    function __toString():string
    {
        return $this->nombre . " es una persona " . $this->estado->descripcion() . " nacida en " . $this->fecha_nacimiento . " y que vive en " . $this->localidad;
    }
}