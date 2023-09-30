<?php
include_once("../conexion/conexion.php");
include_once("../clases/escuela.php");

$objetoEscuela = new Escuela();

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$localidad = $_GET['localidad'];



$objetoEscuela->setEscuela($id, $nombre, $localidad);
header("location: verEscuelas.php");

?>