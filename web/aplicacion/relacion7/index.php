<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/funcionesPuntos.php");
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
$puntos = [];

$nombreImagen = nombreFicheros("imagen", "jpg");
$nombreDatos = nombreFicheros("puntos", "dat");
$rutaImagen = dirname(__FILE__) . "/../../imagenes/puntos/" . $nombreImagen;
$rutaDatos = dirname(__FILE__) . "/datosPuntos/" . $nombreDatos;
$puntos = cargarPuntos($rutaDatos);
if(isset($_POST["guardar"])){
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
        guardarPuntos($rutaDatos, $puntos);
    }

}
if(isset($_POST["borrar"])){
    $posicion = isset($_POST["borrarPuntos"])?$_POST["borrarPuntos"]:"";
    if(validaRango($posicion, $puntos, 2)){
        unset($puntos[$posicion]);
        guardarPuntos($rutaDatos, $puntos);
        $puntos = cargarPuntos($rutaDatos);
        crearImagen($puntos, $rutaImagen);
    }
    else{
        $errores["borrar"] = "Debes seleccionar un punto";
    }
}
if(isset($_POST["subir"])){
    $errorSubida = isset($_FILES["fichero"]["error"])?$_FILES["fichero"]["error"]:4;
    if($errorSubida == 0){
        $nuevoPunto = cargarPuntos($_FILES["fichero"]["tmp_name"]);
        foreach($nuevoPunto as $punto){
            $puntos[] = $punto;
        }
        guardarPuntos($rutaDatos, $puntos);
        crearImagen($puntos, $rutaImagen);
    }
    else{
        $errores["subir"] = "Debes seleccionar un fichero";
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
    formularioBorrar($puntos, $errores);
    formularioSubir($errores);
    textArea($puntos);
    ?>
    <br><br>
    <img src="/imagenes/puntos/<?php echo $nombreImagen?>">
    <br><br>
    <a href="/aplicacion/relacion7/imagen.php">Descargar</a>
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

function formularioBorrar(array $puntos, array $errores){
    ?>
    <form action ="/aplicacion/relacion7/index.php" method="post">
        <select name="borrarPuntos">
            <option value="">Seleccione un punto</option>
            <?php 
            foreach($puntos as $clave => $valor){
                echo "<option value='$clave'>" . $clave . " - " . $valor->getCoordenadaX() . 
                ", " . $valor->getCoordenadaY() . ", " . $valor->getGrosor() . ", " .
                $valor->getColor() .  "</option>";
            }
            ?>
        </select>
        <?php 
        if(isset($errores["borrar"])){
            echo $errores["borrar"];
        }
        ?>
        <input type="submit" name="borrar" value="Borrar">
    </form>

    <?php
}

function formularioSubir(array $errores){
    ?>
    <br>
    <form action="/aplicacion/relacion7/index.php" method="post" enctype="multipart/form-data">
        <label>Fichero de puntos</label>
        <input type="file" name="fichero">
        <?php 
        if(isset($errores["subir"])){
            echo $errores["subir"];
        }
        ?>
        <input type="submit" name="subir" value="Subir fichero">
    </form>
    <?php
}