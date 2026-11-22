<?php 
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/funcionesPuntos.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

$nombreDatos = nombreFicheros("puntos", "dat");
$rutaDatos = dirname(__FILE__) . "/datosPuntos/" . $nombreDatos;
$puntos = cargarPuntos($rutaDatos);
$imagen = dibujarImagen($puntos);

header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=" . nombreFicheros("imagen", "jpg"));

imagejpeg($imagen);
exit;
