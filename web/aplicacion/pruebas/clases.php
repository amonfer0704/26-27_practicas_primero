<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//$usuario = getenv("MYSQL_USER");

/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba
{
    //definición de constantes
    public const PI = 2.14;
    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;
    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);
    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";
        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";
        return true;
    }
}
//se crea una instancia de la clase prueba
$instancia=new ClasePrueba();
//accede a la propiedad pública de la instancia
$instancia->propPublica=50;
//se accede a la propiedad de clase (estática)
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Clases");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    
<?php 
}
class Unica{
    private static bool $_creada = false;
    public int $numero = 12;
    private ?Unica $objeto = null;

    private function __construct(int $val = 0)
    {
        $this->numero = 12;
    }

    public static function crear(int $numero): static{
        if(self::$_creada){
            return self::$objeto;
        }
        $obj = new static($numero);
        self::$objeto = $obj;
        self::$_creada = true;
        return self::$objeto;
    }
}
$programa = Unica::crear(100);
$programa -> numero = 1;
$segundaUnica = Unica::crear(300);

$ins = new Instituto();