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
    $textoX = $coordenadaX;
    if(!validaExpresion($textoX, "/^([0-9]|[1-9][0-9]|[1-4][0-9]{2}|500)$/", "")){
        $errores["coordenadaX"] = "La coordenada X debe ser un entero entre 0 y 500";
    }
    $coordenadaY = isset($_POST["coordenadaY"])?trim($_POST["coordenadaY"]):"";
    $textoY = $coordenadaY;
    if(!validaExpresion($textoY, "/^([0-9]|[1-9][0-9]|[1-4][0-9]{2}|500)$/", "")){
        $errores["coordenadaY"] = "La coordenada Y debe ser un entero entre 0 y 500";
    }
    $color = isset($_POST["color"])?$_POST["color"]:"";
    if(!validaRango($color, $opcionesColor, 2)){
        $errores["color"] = "Debes seleccionar al menos una opción";
        $color = "";
    }
    $grosor = isset($_POST["grosor"])?$_POST["grosor"]:"";
    if(!validaRango($grosor, $opcionesGrosor, 2)){
        $errores["grosor"] = "Debes seleccionar al menos una opción";
        $grosor = "";
    }
    if(count($errores) === 0){
        $correcto = true;
        $puntos[] = new Punto($coordenadaX, $coordenadaY, $color, $grosor);
        crearImagen($puntos, $rutaImagen);
    }

}
if(!file_exists($rutaImagen)){
    crearImagen($puntos, $rutaImagen);
}

$datos = [
    "coordenadaX" => $coordenadaX,
    "coordenadaY" => $coordenadaY,
    "color" => $color,
    "grosor" => $grosor,
    "opcionesColor" => $opcionesColor,
    "opcionesGrosor" => $opcionesGrosor
];

$nombreImagen = nombreImagen();
$rutaImagen = dirname(__FILE__) . "/../../imagenes/puntos";
$nombreImagen;
//dibuja la plantilla de la vista
inicioCabecera("Relación 7");
cabecera();
finCabecera();
inicioCuerpo("index", $barra);
cuerpo($datos, $errores, $correcto, $puntos, $nombreImagen);//llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $datos, array $errores, bool $correcto, array &$puntos, string $nombreImagen) 
{
?>
<?php
    if($correcto){
        $puntos[] = new Punto($datos["coordenadaX"], $datos["coordenadaY"], $datos["color"], $datos["grosor"]);
        echo "El nuevo punto se ha creado correctamente"; 
    }
    formulario($datos, $errores);
    textArea($puntos);
    imagen($nombreImagen);
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
        <br><br>
        <label>Coordenada Y</label> 
        <input type="text" name= "coordenadaY" id="coordenadaY" value="<?php echo $datos["coordenadaY"]?>">
        <?php  
        if(isset($errores["coordenadaY"])){
            echo $errores["coordenadaY"];
        }
        ?>
        <br><br>
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
        <br><br>
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
        <br><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>
    <?php
}

function textArea(array $puntos){
    ?>
    <br><br>
    <textarea cols="100" rows="10"><?php 
        echo "\n";
        foreach($puntos as $clave=>$valor){
            echo "Coordenada X: " . $valor->getCoordenadaX() . " Coordenada Y: " . 
                    $valor->getCoordenadaY() . " Color: " . $valor->getColor() . 
                    " Grosor: " . $valor->getGrosor() . "\n";
        }
        ?>
    </textarea>
    <?php
}
function imagen(string $nombreImagen){
    ?>
    <br><br>
    <img src="/imagenes/puntos/<?php echo $nombreImagen . "?" . time(); ?>">
    <?php
}
function nombreImagen(): string{
    $ip = "";
    if(isset($_SERVER["REMOTE_ADDR"])){
        $ip = str_replace([".", ":"], "_", $_SERVER["REMOTE_ADDR"]);
    }
    $agente = "";
    if(isset($_SERVER["HTTP_USER_AGENT"])){
        $agente = $_SERVER["HTTP_USER_AGENT"];
    }
    $navegador = "otro";
    if(mb_strpos($agente, "Firefox") !== false){
        $navegador = "firefox";
    }
    elseif(mb_strpos($agente, "Edg") !== false){
        $navegador = "edge";
    }
    elseif(mb_strpos($agente, "Chrome") !== false){
        $navegador = "chrome";
    }
    elseif(mb_strpos($agente, "Safari") !== false){
        $navegador = "safari";
    }
    return "imagen_" . $ip . "_" . $navegador . ".jpg";
}
function crearImagen(array $puntos, string $ruta){
    if(!file_exists(dirname($ruta))){
        mkdir($ruta);
    }
}