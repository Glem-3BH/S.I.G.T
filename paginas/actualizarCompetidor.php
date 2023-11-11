<?php
include_once("../conexion/conexion.php");
include_once("../clases/listarCompetidores.php");

$objetoCompetidor = new ListarCompetidores();

$nombre = $_GET['nombre'];
$ci = $_GET['ci'];
$sexo = $_GET['sexo'];
$fnac = $_GET['fnac'];
$estado = $_GET['estado'];


$objetoCompetidor->setCompetidor($ci, $nombre, $sexo, $fnac);
header("location: verCompetidores.php");

?>