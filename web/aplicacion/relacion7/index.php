<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/relacion7/index.php",
    ],
    [
        "TEXTO" => "index",
    ]
];
//$usuario = getenv("MYSQL_USER");
$coordenadaX = "";
$coordenadaY = "";
$color = "";
$grosor = "";
$opcionesGrosor = Punto::GROSORES;
$opcionesColor = Punto::COLORES;
$errores = [];
$correcto = false;
$puntos = [
    new Punto(10, 20, "black", 1),
    new Punto(100, 150, "red", 2),
    new Punto(300, 400, "blue", 3)
];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $coordenadaX = isset($_POST["coordenadaX"])?trim($_POST["coordenadaX"]):"";
    if(!validaEntero($coordenadaX, 0, 500, 0)){
        $errores["coordenadaX"] = "La coordenada X debe ser un entero entre 0 y 20000";
    }
    $coordenadaY = isset($_POST["coordenadaY"])?trim($_POST["coordenadaY"]):"";
    if(!validaEntero($coordenadaY, 0, 500, 0)){
        $errores["coordenadaY"] = "La coordenada Y debe ser un entero entre 0 y 20000";
    }
    $color = isset($_POST["color"])?$_POST["color"]:0;
    if(!validaRango($color, $opcionesColor, 2)){
        $errores["color"] = "Debes seleccionar al menos una opción";
        $color = "";
    }
    $grosor = isset($_POST["grosor"])?$_POST["grosor"]:0;
    if(!validaRango($grosor, $opcionesGrosor, 2)){
        $errores["grosor"] = "Debes seleccionar al menos una opción";
        $grosor = "";
    }
    if(count($errores) === 0){
        $correcto = true;
    }

}

$datos = [
    "coordenadaX" => $coordenadaX,
    "coordenadaY" => $coordenadaY,
    "color" => $color,
    "grosor" => $grosor,
    "opcionesColor" => $opcionesColor,
    "opcionesGrosor" => $opcionesGrosor
];

//dibuja la plantilla de la vista
inicioCabecera("Relación 7");
cabecera();
finCabecera();
inicioCuerpo("index", $barra);
cuerpo($datos, $errores, $correcto, $puntos);//llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $datos, array $errores, bool $correcto, array &$puntos) 
{
?>
<?php
    if($correcto){
        $puntos[] = new Punto($datos["coordenadaX"], $datos["coordenadaY"], $datos["color"], $datos["grosor"]);
        echo "El nuevo punto se ha creado correctamente"; 
    }
    else{
        formulario($datos, $errores);
    }
}

function formulario(array $datos,array $errores){
    ?>
    <form action ="/aplicacion/relacion7/index.php" method="post">
        <label>Coordenada X:</label>
        <input type="text" name="coordenadaX" id="coordenadaX" value="<?php echo $datos["coordenadaX"]?>">
        <?php  
        if(isset($errores["coordenadaX"])){
            echo $errores["coordenadaX"];
        }
        ?>
        <br>
        <label>Coordenada Y</label> 
        <input type="text" name= "coordenadaY" id="coordenadaY" value="<?php echo $datos["coordenadaY"]?>">
        <?php  
        if(isset($errores["coordenadaY"])){
            echo $errores["coordenadaY"];
        }
        ?>
        <br>
        <label>Colores</label>
        <select name="color" id="color">
            <option value="">Elige un color</option>
            <?php 
            foreach($datos["opcionesColor"] as $clave => $valor){
                $seleccionado = "";
                if($datos["color"] == $clave){
                    $seleccionado = " selected";
                }
                echo "<option value='$clave' $seleccionado>" . $valor["nombre"] . "</option>";
            }
                ?>
            </select>
            <?php
            if(isset($errores["color"])){
                echo $errores["color"];
            }
            ?>
        <br>
        <label>Colores</label>
            <?php 
            foreach($datos["opcionesGrosor"] as $clave => $valor){
                ?>
                <input type="radio" name="grosor" value="<?php echo $clave?>"
                <?php 
                if($datos["grosor"] == $clave){
                    echo " checked"; 
                }
                ?>
                >
                <?php 
                echo $valor;
            }
            ?>
            <?php
            if(isset($errores["grosor"])){
                echo $errores["grosor"];
            }
            ?>
            <br>
            <input type="submit" name="guardar" value="Guardar">
    </form>
    <?php
}
