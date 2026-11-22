<?php
/**
 * Método que devuelve un nombre de fichero con la ip y el navegador del cliente
 *
 * @param string $nombre primera parte del nombre
 * @param string $extension extensión del fichero
 * @return string nombre del fichero
 */
function nombreFicheros(string $nombre, string $extension): string{
    $ip = "";
    if(isset($_SERVER["REMOTE_ADDR"])){
        $ip = str_replace([".", ":"], "_", $_SERVER["REMOTE_ADDR"]);
    }
    $agente = "";
    if(isset($_SERVER["HTTP_USER_AGENT"])){
        $agente = $_SERVER["HTTP_USER_AGENT"];
    }
    /**
     * Se verifica el tipo de navegador que usa el cliente
     */
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
    return $nombre . "_" . $ip . "_" . $navegador . "." . $extension;
}

/**
 * Método que dibuja la imagen con los puntos y la devuelve
 * No se guarda en ningún fichero
 *
 * @param array $puntos array de puntos
 * @return GdImage imagen dibujada
 */
function dibujarImagen(array $puntos): GdImage{
    $imagenTamaño = imagecreate(500, 500);
    $imagenColores = imagecolorallocate($imagenTamaño, 255, 255, 255);
    imagefilledrectangle($imagenTamaño, 0, 0, 500, 500, $imagenColores);
    $colorMarco = imagecolorallocate($imagenTamaño, 0, 0, 0);
    imagerectangle($imagenTamaño, 0, 0, 499, 499, $colorMarco);
    foreach($puntos as $punto){
        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];
        imageline($imagenTamaño, $punto->getCoordenadaX() - $punto->getGrosor() * 4,
            $punto->getCoordenadaY() - $punto->getGrosor() * 4, $punto->getCoordenadaX() + $punto->getGrosor() * 4,
            $punto->getCoordenadaY() + $punto->getGrosor() * 4, imagecolorallocate($imagenTamaño, $rgb[0], $rgb[1], $rgb[2]));
        imageline($imagenTamaño, $punto->getCoordenadaX() - $punto->getGrosor() * 4,
            $punto->getCoordenadaY() + $punto->getGrosor() * 4, $punto->getCoordenadaX() + $punto->getGrosor() * 4,
            $punto->getCoordenadaY() - $punto->getGrosor() * 4, imagecolorallocate($imagenTamaño, $rgb[0], $rgb[1], $rgb[2]));
    }
    return $imagenTamaño;
}

/**
 * Método que guarda la imagen de los puntos en un fichero jpg
 *
 * @param array $puntos array de puntos
 * @param string $ruta ruta del fichero donde se guarda la imagen
 * @return void
 */
function crearImagen(array $puntos, string $ruta): void{
    if(!file_exists(dirname($ruta))){
        mkdir(dirname($ruta));
    }
    $imagen = dibujarImagen($puntos);
    imagejpeg($imagen, $ruta, 50);
}

/**
 * Método que escribe todos los puntos en un fichero, una línea por punto
 * con el formato x ; y ; color ; grosor
 *
 * @param string $ruta ruta del fichero de puntos
 * @param array $puntos array de puntos
 * @return void
 */
function guardarPuntos(string $ruta, array $puntos){
    /**
     * Si la carpeta no existe, se crea
     */
    if(!file_exists(dirname($ruta))){
        mkdir(dirname($ruta));
    }
    $fic = fopen($ruta, "w");
    foreach($puntos as $punto){
        $coordenadaX = $punto->getCoordenadaX();
        $coordenadaY = $punto->getCoordenadaY();
        $color = $punto -> getColor();
        $grosor = $punto -> getGrosor();
        fputs($fic, $coordenadaX . " ; " . $coordenadaY . " ; " . $color . " ; " .
            $grosor . "\n");
    }
    fclose($fic);
}

/**
 * Método que lee un fichero de puntos y devuelve un array de objetos
 * Las líneas que no son válidas se ignoran
 *
 * @param string $ruta ruta del fichero de puntos
 * @return array array de puntos
 */
function cargarPuntos(string $ruta): array{
    $arrayPuntos = [];
    if(file_exists($ruta)){
        $fic = fopen($ruta, "r");
        while($linea = fgets($fic)){
            $linea = trim($linea);
            if($linea != ""){
                $partes = mb_split(" ; ", $linea);
                if(count($partes) == 4){
                    try{
                        $arrayPuntos[] = new Punto($partes[0], $partes[1], $partes[2], $partes[3]);
                    }
                    catch(Exception $e){
                    }
                    catch(TypeError $e){
                    }
                }
            }
        }
        fclose($fic);
    }
    return $arrayPuntos;
}
