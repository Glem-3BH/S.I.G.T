<?php
include_once("../conexion/conexion.php");
include_once("../clases/torneo.php");

$objetoTorneo = new Torneo();

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$fecha = $_GET['fecha'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];



$objetoTorneo->setTorneo($id, $nombre, $fecha, $direccion, $categoria);
header("location: verTorneos.php");

?>