<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php"
    ],
    [
        "TEXTO" => "pruebas",
        "ENLACE" => "/aplicacion/relacion5/index.php",
    ],
    [
        "TEXTO" => "index",
    ]
];
//$usuario = getenv("MYSQL_USER");
$nombre = "";
$clave = "";
$fecNacimiento = "";
$fechaCarnet = "";
$diaCarnet = "";
$mesCarnet = "";
$anioCarnet = "";
$hora = "";
$estado = "";
$estudios = [];
$hermanos = 0;
$sueldos = 1100;
$estados = [1 => "Estudiante", 2 => "En paro", 3 => "Trabajando", 4 => "Jubilado"];
$opcionesEstudios = [0 => "Sin estudios", 1 => "Primaria", 2 => "Secundaria", 3 => "Bachillerato", 4 => "Ciclo formativo", 5 => "Universitarios"];

$errores = [];
$correcto = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = isset($_POST["nombre"])?mb_strtoupper(trim($_POST["nombre"])):"";
    if(!validaCadena($nombre, 25, "")){
        $errores["nombre"] = "El nombre no puede tener más de 25 carácteres";
    }
    else if(!validaExpresion($nombre, "/^[^H]/u", "")){
        $errores["nombre"] = "El nombre no puede estar vacío ni empezar por H";
    }

    $clave = isset($_POST["clave"])?$_POST["clave"]: "";
    if(!validaCadena($clave, 15, "")){
        $errores["clave"] = "La longitud de la contraseña no puede ser más de 15";
    }
    else if(!validaExpresion($clave, '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$_\-;<>@])[A-Za-z\d$_\-;<>@]{8,15}$/', "")){
        $errores["clave"] = "La contraseña debe tener entre 8 y 15 caracteres, con una mayúscula, otra minúscula, una cifra y un carácter especial";
    }

    $fecNacimiento = isset($_POST["fecNacimiento"])?trim($_POST["fecNacimiento"]):"";
    if(!validaFecha($fecNacimiento, "")){
        $errores["fecNacimiento"] = "La fecha de nacimiento no es válida";
    }

    $diaCarnet = isset($_POST["diaCarnet"])?trim($_POST["diaCarnet"]):"";
    $mesCarnet = isset($_POST["mesCarnet"])?trim($_POST["mesCarnet"]):"";
    $anioCarnet = isset($_POST["anioCarnet"])?trim($_POST["anioCarnet"]):"";
    $fechaCarnet = $diaCarnet . "/" . $mesCarnet . "/" . $anioCarnet;
    if(!validaFecha($fechaCarnet, "")){
        $errores["fechaCarnet"] = "La fecha del carnet no es válida";
        $diaCarnet = "";
        $mesCarnet = "";
        $anioCarnet = "";
    }
    if(!isset($errores["fecNacimiento"]) && !isset($errores["fechaCarnet"])){
        $nacimiento = DateTime::createFromFormat("d/m/Y", $fecNacimiento);
        $carnet = DateTime::createFromFormat("d/m/Y", $fechaCarnet);
        $carnet->sub(new DateInterval("P18Y"));
        $intervalo = $nacimiento->diff($carnet);
        if($intervalo->format("%R") === "-"){
            $errores["fechaCarnet"] = "Deberías tener 18 años para haberte sacado el carnet";
        }
    }

    $hora = isset($_POST["hora"])?trim($_POST["hora"]):"";
    if(!validaHora($hora, "")){
        $errores["hora"] = "La hora no es válida";
    }

    $estado = isset($_POST["estado"])?$_POST["estado"]:0;
    if(!validaRango($estado, $estados, 2)){
        $errores["estado"] = "Debes seleccionar al menos un estado";
        $estado = "";
    }

    $estudioMarcado = isset($_POST["estudios"])?$_POST["estudios"]:[];
    $estudios = [];
    foreach($estudioMarcado as $valor){
        if(validaRango($valor, $opcionesEstudios, 2)){
            $estudios[] = $valor;
        }
        else{
            $errores["estudios"] = "Has marcado una opción incorrecta";
        }
    }
    if(in_array("0", $estudios)){
        $estudios = ["0"];
    }
    if(count($estudios) === 0 && !isset($errores["estudios"])){
        $errores["estudios"] = "Debes seleccionar al menos uno de los estudios";
    }

    $hermanos = isset($_POST["hermanos"])?trim($_POST["hermanos"]):"";
    $numHermanos = 0;
    if(validaExpresion($hermanos, "/^\d{1,2}$/", "")){
        $numHermanos = $hermanos;
    }
    if($hermanos === "" || !validaEntero($numHermanos, 0, 20, 0)){
        $errores["hermanos"] = "El número de hermanos debe estar entre 0 y 20";
    }
    $hermanos = $numHermanos;

    $sueldos = isset($_POST["sueldos"])?trim($_POST["sueldos"]):"";
    $sueldoTotal = str_replace(",", ".", $sueldos);
    $numSueldo = 1100.0;
    if(validaExpresion($sueldoTotal, "/^\d+(\.\d+)?$/", "")){
        $numSueldo = $sueldoTotal;
    }
    if($sueldoTotal === "" || !validaReal($numSueldo, 1000, 150000, 1100)){
        $errores["sueldos"] = "El sueldo debe estar entre 1000 y 150000";
    }
    $sueldos = $numSueldo;

    if(count($errores) === 0){
        $correcto = true;
    }
}

$datos = [
    "nombre" => $nombre,
    "fecNacimiento" => $fecNacimiento,
    "diaCarnet" => $diaCarnet,
    "mesCarnet" => $mesCarnet,
    "anioCarnet" => $anioCarnet,
    "fechaCarnet" => $fechaCarnet,
    "hora" => $hora,
    "estado" => $estado,
    "estados" => $estados,
    "opcionesEstudios" => $opcionesEstudios,
    "estudios" => $estudios,
    "hermanos" => $hermanos,
    "sueldos" => $sueldos
];

//dibuja la plantilla de la vista
inicioCabecera("Relación 5");
cabecera();
finCabecera();
inicioCuerpo("index", $barra);
cuerpo($datos, $errores, $correcto);//llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo(array $datos, array $errores, bool $correcto) 
{
?>
    <p><a href="/aplicacion/relacion5/prueba_librerias.php">Prueba de las librerías de filtrado y saneamiento</a></p>
<?php
    if($correcto){
?>
    <h2>Datos introducidos</h2>
    <ul>
        <li>Nombre: <?php echo $datos["nombre"]?></li>
        <li>Contraseña: correcta</li>
        <li>Fecha de nacimiento: <?php echo $datos["fecNacimiento"]?></li>
        <li>Fecha del carnet: <?php echo $datos["fechaCarnet"]?></li>
        <li>Hora de levantarse: <?php echo $datos["hora"]?></li>
        <li>Estado: <?php echo $datos["estados"][$datos["estado"]]?></li>
        <li>Estudios: 
            <ul>
                <?php 
                foreach($datos["estudios"] as $valor){
                ?>
                    <li><?php echo $datos["opcionesEstudios"][$valor] ?></li>
                <?php 
                }
                ?>
            </ul>
        </li>
        <li>Hermanos: <?php echo $datos["hermanos"] ?></li>
        <li>Sueldo: <?php echo $datos["sueldos"]?></li>
    </ul>
    <?php 
    }
    else{
        formulario($datos, $errores);
    }
}

function formulario(array $datos,array $errores){
    ?>
    <form action ="/aplicacion/relacion5/index.php" method="post">
        <p>Nombre:
        <input type="text" name="nombre" id="nombre" value="<?php echo $datos["nombre"]?>">
        <?php  
        if(isset($errores["nombre"])){
            echo $errores["nombre"];
        }
        ?>
        </p>
        <p>Contraseña: 
            <input type="password" name="clave" id="clave">
            <?php  
            if(isset($errores["clave"])){
                echo $errores["clave"];
            }
            ?>
        </p>
        <p>Fecha de nacimiento: 
            <input type="text" name="fecNacimiento" id="fecNacimiento" value="<?php echo $datos["fecNacimiento"]?>">
            <?php  
            if(isset($errores["fecNacimiento"])){
                echo $errores["fecNacimiento"];
            }
            ?>
        </p>
        <p>Fecha del carnet: 
            dia: <input type="text" name="diaCarnet" id="diaCarnet" value="<?php echo $datos["diaCarnet"]?>">
            mes: <input type="text" name="mesCarnet" id="mesCarnet" value="<?php echo $datos["mesCarnet"]?>">
            año: <input type="text" name="anioCarnet" id="anioCarnet" value="<?php echo $datos["anioCarnet"]?>">
            <?php  
            if(isset($errores["fechaCarnet"])){
                echo $errores["fechaCarnet"];
            }
            ?>
        </p>
        <p>Hora de levantarse: 
            <input type="text" name="hora" id="hora" value="<?php echo $datos["hora"]?>">
            <?php  
            if(isset($errores["hora"])){
                echo $errores["hora"];
            }
            ?>
        </p>
        <p>Estado: 
        <?php 
            foreach($datos["estados"] as $clave => $valor){
                ?>
                <input type="radio" name="estado" value="<?php echo $clave?>"
                <?php 
                if($datos["estado"] == $clave){
                    echo "checked"; 
                }
                ?>>
                <?php 
                echo $clave . " - " . $valor;
            }
            ?>
            <input type="radio" name="estado" value="5">5 - Incorrecto
            <?php
            if(isset($errores["estado"])){
                echo $errores["estado"];
            }
            ?>
        </p>
        <p>Estudios: 
        <?php 
            foreach($datos["opcionesEstudios"] as $clave => $valor){
                ?>
                <input type="checkbox" name="estudios[]" value="<?php echo $clave?>"
                <?php 
                if(in_array($clave, $datos["estudios"])){
                    echo "checked"; 
                }
                ?>>
                <?php 
                echo $clave . " - " . $valor;
            }
            
            ?>
            <input type="checkbox" name="estudios[]" value="6">6 - Incorrecto
            <?php
            if(isset($errores["estudios"])){
                echo $errores["estudios"];
            }
            ?>
        </p>
        <p>Hermanos: 
            <input type="text" name="hermanos" id="hermanos" value="<?php echo $datos["hermanos"]?>">
            <?php  
            if(isset($errores["hermanos"])){
                echo $errores["hermanos"];
            }
            ?>
        </p>
        <p>Sueldo: 
            <input type="text" name="sueldos" id="sueldos" value="<?php echo $datos["sueldos"]?>">
            <?php  
            if(isset($errores["sueldos"])){
                echo $errores["sueldos"];
            }
            ?>
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
    <?php
}
