<?php
/**
 * Clase Flauta que hereda de InstrumentoViento e implementa la interfaz
 * IFabricable
 */
final class Flauta extends InstrumentoViento implements IFabricable{

    /**
     * Constructor vacío  
    */

    private function __construct(string $material, int $edad)
    {
        parent::__construct($material, $edad);
    }

    /**
     * Método estático que devuelve una instancia de Flauta
     * con los valores indicados
     * @param array miArray
     * @return Flauta miFlauta
     */
    public static function crearDesdeArray(array $datos = []): Flauta{
        $material = $datos["material"]?$datos["material"]:"madera";
        $edad = $datos["edad"]?$datos["edad"]:10;
        $miFlauta = new Flauta($material, $edad);
        return $miFlauta;
    }

    /**
     * Método de clonación para la clase flauta de forma que el 
     * nuevo objeto tenga los mismos valores, salvo la edad que será 0
     * y el número de instancia
     */
    public function __clone(): void
    {
        $this->edad = 0;
        $this->numInstancia = self::$totalInstancias++;
    }

    /** 
     * Métodos implementados de la interfaz IFabricable
     */
	public function metodoFabricacion(): string
	{
        return "Para fabricar una Flauta necesitamos madera";
	}

    public function metodoReciclado(): string
	{
        $texto = "";
        switch(parent::$material){
            case "madera": $texto = "Contenedor marrón o al fuego"; break;
            case "plástico": $texto = "Contenedor amarillo"; break;
            case "metal": $texto = "Contenedor amarillo o punto limpio"; break;
            default: "Material desconocido, llévalo al punto limpio";
        }
        return "Una madera se puede reciclar si la echas al fuego";
	}
}