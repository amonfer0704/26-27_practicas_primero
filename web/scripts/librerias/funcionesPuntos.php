<?php
function nombreFicheros(string $nombre, string $extension): string{
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
    return $nombre . "_" . $ip . "_" . $navegador . "." . $extension;
}

function dibujarImagen(array $puntos){
    $imagenTamaño = imagecreate(500, 500);
    $imagenColores = imagecolorallocate($imagenTamaño, 255, 255, 255);
    imagefilledrectangle($imagenTamaño, 0, 0, 500, 500, $imagenColores);
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
function crearImagen(array $puntos, string $ruta){
    if(!file_exists(dirname($ruta))){
        mkdir(dirname($ruta));
    }
    $imagen = dibujarImagen($puntos);
    imagejpeg($imagen, $ruta, 50);
}

function guardarPuntos(string $ruta, array $puntos){
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
                }
            }
        }
        fclose($fic);
    }
    return $arrayPuntos;
}
