<?php
include_once("../conexion/conexion.php");
include_once("../clases/torneo.php");

$objetoTorneo = new Torneo();

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$fecha = $_GET['fecha'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];
$sexo = $_GET['sexo'];



$objetoTorneo->setTorneo($id, $nombre, $fecha, $direccion, $categoria, $sexo);
header("location: verTorneos.php");

?>