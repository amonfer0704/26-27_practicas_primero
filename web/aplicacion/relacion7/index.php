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
$nombreImagen = nombreImagen();
$rutaImagen = dirname(__FILE__) . "/../../imagenes/puntos/" . $nombreImagen;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $coordenadaX = isset($_POST["coordenadaX"])?trim($_POST["coordenadaX"]):"";
    try{
        $textoX = $coordenadaX;
        if(!validaEntero($textoX, 0, 500, 0)){
            $errores["coordenadaX"] = "La coordenada X debe ser un entero entre 0 y 500";
        } 
    }
    catch(error){
        $errores["coordenadaX"] = "La coordenada X no puede estar vacía";
    }   
    $coordenadaY = isset($_POST["coordenadaY"])?trim($_POST["coordenadaY"]):"";
    try{
        $textoY = $coordenadaY;
        if(!validaEntero($textoY, 0, 500, 0)){
            $errores["coordenadaY"] = "La coordenada Y debe ser un entero entre 0 y 500";
        }
    }
    catch(error){
        $errores["coordenadaY"] = "La coordenada Y no puede estar vacía";
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
function cuerpo(array $datos, array $errores, bool $correcto, array $puntos, string $nombreImagen) 
{
?>
<?php
    if($correcto){
        echo "El nuevo punto se ha creado correctamente"; 
    }
    formulario($datos, $errores);
    textArea($puntos);
    ?>
    <br><br>
    <img src="/imagenes/puntos/<?php echo $nombreImagen?>">
    <?php
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
        <label>Grosor</label>
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
        mkdir(dirname($ruta));
    }
    $imagenTamaño = imagecreate(510, 510);
    $imagenColores = imagecolorallocate($imagenTamaño, 255, 255, 255);
    imagefilledrectangle($imagenTamaño, 0, 0, 510, 510, $imagenColores);
    foreach($puntos as $punto){
        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
        imageline($imagenTamaño, $punto->getCoordenadaX() - $punto->getGrosor() * 4,
        $punto->getCoordenadaY() - $punto->getGrosor() * 4, $punto->getCoordenadaX() + $punto->getGrosor() * 4,
        $punto->getCoordenadaY() + $punto->getGrosor() * 4, imagecolorallocate($imagenTamaño, $rgb[0], $rgb[1], $rgb[2]));
        imageline($imagenTamaño, $punto->getCoordenadaX() - $punto->getGrosor() * 4,
        $punto->getCoordenadaY() + $punto->getGrosor() * 4, $punto->getCoordenadaX() + $punto->getGrosor() * 4,
        $punto->getCoordenadaY() - $punto->getGrosor() * 4, imagecolorallocate($imagenTamaño, $rgb[0], $rgb[1], $rgb[2]));
    }
    imagejpeg($imagenTamaño, $ruta, 50);
    imagefill($imagenTamaño, 0, 0, imagecolorallocate($imagenTamaño, 0, 0, 0));
}