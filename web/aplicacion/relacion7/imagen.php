<?php 
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/funcionesPuntos.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

/**
 * Fichero de puntos de este cliente
 */
$nombreDatos = nombreFicheros("puntos", "dat");
$rutaDatos = dirname(__FILE__) . "/datosPuntos/" . $nombreDatos;

/**
 * Cargar los puntos y dibujo la imagen al vuelo sin guardarla
 */
$puntos = cargarPuntos($rutaDatos);
$imagen = dibujarImagen($puntos);

/**
 * Se especifica de que es una imagen jpg y que la debe descargar
 */
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=" . nombreFicheros("imagen", "jpg"));

/**
 * Sin ruta, imagejpeg envía la imagen directamente al navegador
 */
imagejpeg($imagen);
exit;
