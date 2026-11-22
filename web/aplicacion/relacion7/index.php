<?php
/**
 * Importación de cabecera, validación, clase Punto y funciones de Puntos
 */
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
/**
 * Variables donde se guarda lo que escribe el usuario en el formulario
 */
$coordenadaX = "";
$coordenadaY = "";
$color = "";
$grosor = "";

/**
 * Opciones de grosos y de color
 */
$opcionesGrosor = Punto::GROSORES;
$opcionesColor = Punto::COLORES;

/**
 * Errores del formulario y array donde se guardan los puntos
 */
$errores = [];
$puntos = [];
$correcto = false;

/**
 * Nombre y ruta de la imagen y del fichero de puntos
 */
$nombreImagen = nombreFicheros("imagen", "jpg");
$nombreDatos = nombreFicheros("puntos", "dat");
$rutaImagen = dirname(__FILE__) . "/../../imagenes/puntos/" . $nombreImagen;
$rutaDatos = dirname(__FILE__) . "/datosPuntos/" . $nombreDatos;

/**
 * Cargar los puntos que hay guardados en el fichero
 */
$puntos = cargarPuntos($rutaDatos);

/**
 * Comprobación si se ha pulsado el botón guardar
 */
if(isset($_POST["guardar"])){
    $coordenadaX = isset($_POST["coordenadaX"])?trim($_POST["coordenadaX"]):"";
    /**
     * Validación de la coordenadaX
     */
    try{
        $textoX = $coordenadaX;
        if(!validaEntero($textoX, 0, 500, 0)){
            $errores["coordenadaX"] = "La coordenada X debe ser un entero entre 0 y 500";
        } 
    }
    catch(TypeError $e){
        $errores["coordenadaX"] = "La coordenada X no puede estar vacía";
    }
    /**
     * Validación de la coordenadaY
     */
    $coordenadaY = isset($_POST["coordenadaY"])?trim($_POST["coordenadaY"]):"";
    try{
        $textoY = $coordenadaY;
        if(!validaEntero($textoY, 0, 500, 0)){
            $errores["coordenadaY"] = "La coordenada Y debe ser un entero entre 0 y 500";
        }
    }
    catch(TypeError){
        $errores["coordenadaY"] = "La coordenada Y no puede estar vacía";
    }
    /**
     * Validación del color elegido dependiendo de la clase Punto
     */
    $color = isset($_POST["color"])?$_POST["color"]:"";
    if(!validaRango($color, $opcionesColor, 2)){
        $errores["color"] = "Debes seleccionar al menos una opción";
        $color = "";
    }

    /**
     * Validación del grosor elegido dependiendo de la clase Punto
     */
    $grosor = isset($_POST["grosor"])?$_POST["grosor"]:"";
    if(!validaRango($grosor, $opcionesGrosor, 2)){
        $errores["grosor"] = "Debes seleccionar al menos una opción";
        $grosor = "";
    }

    /**
     * Si no hay errores, se crea el punto, actualizo la imagen y el fichero
     */
    if(count($errores) === 0){  
        try{
            $puntos[] = new Punto($coordenadaX, $coordenadaY, $color, $grosor);
            crearImagen($puntos, $rutaImagen);
            guardarPuntos($rutaDatos, $puntos);
            header("Location: /aplicacion/relacion7/index.php");
            exit;

        } 
        catch(Exception $e){
            $errores["guardar"] = "Error con la creación del punto";
        }
        catch(TypeError $e){
            $errores["guardar"] = "Error con el tipado de los valores";
        }
    }

}

/**
 * Comprobación si se ha pulsado el botón borrar
 */
if(isset($_POST["borrar"])){
    $posicion = isset($_POST["borrarPuntos"])?$_POST["borrarPuntos"]:"";

    /**
     * Si la posición elegida existe, borro el punto y actualizo el fichero
     */
    if(validaRango($posicion, $puntos, 2)){
        unset($puntos[$posicion]);
        guardarPuntos($rutaDatos, $puntos);
        $puntos = cargarPuntos($rutaDatos);
        crearImagen($puntos, $rutaImagen);
        header("Location: /aplicacion/relacion7/index.php");
        exit;
    }
    else{
        $errores["borrar"] = "Debes seleccionar un punto";
    }
}

/**
 * Comprobación si se ha pulsado el botón subir
 */
if(isset($_POST["subir"])){
    /**
     * Si el fichero se ha subido bien, el error vale 0
     */
    $errorSubida = isset($_FILES["fichero"]["error"])?$_FILES["fichero"]["error"]:4;
    if($errorSubida == 0){
        /**
         * Se cargan los puntos del fichero y se añade los que tenía
         */
        $nuevoPunto = cargarPuntos($_FILES["fichero"]["tmp_name"]);
        foreach($nuevoPunto as $punto){
            $puntos[] = $punto;
        }
        guardarPuntos($rutaDatos, $puntos);
        crearImagen($puntos, $rutaImagen);
        header("Location: /aplicacion/relacion7/index.php");
        exit;
    }
    else{
        $errores["subir"] = "Debes seleccionar un fichero";
    }
}

/**
 * Si la imagen no existe, se crea
 */
if(!file_exists($rutaImagen)){
    crearImagen($puntos, $rutaImagen);
}

/**
 * array de datos para pasarlos todos al cuerpo
 */
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

/**
 * Método que muestra el formulario para añadir puntos
 *
 * @param array $datos parámetros del formulario, opciones de color y grosor
 * @param array $errores errores de cada campo
 * @return void
 */
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

/**
 * Método que muestra los puntos en un textarea
 *
 * @param array $puntos array de puntos
 * @return void
 */
function textArea(array $puntos){
    ?>
    <br><br>
    <textarea cols="100" rows="10" readonly><?php 
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

/**
 * Método que muestra el formulario con un combo para elegir el punto que se quiere borrar
 *
 * @param array $puntos array de puntos
 * @param array $errores errores de los formularios
 * @return void
 */
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

/**
 * Método que muestra el formulario para subir el fichero de puntos
 *
 * @param array $errores errores de los formularios
 * @return void
 */
function formularioSubir(array $errores){
    ?>
    <br>
    <form action="/aplicacion/relacion7/index.php" method="post" enctype="multipart/form-data">
        <label>Fichero de puntos</label>
        <br>
        <input type="file" name="fichero">
        <br>
        <?php 
        echo "<input type='submit' name='subir' value='Subir fichero'> ";
        if(isset($errores["subir"])){
            echo $errores["subir"];
        }
        ?>
    </form>
    <?php
}