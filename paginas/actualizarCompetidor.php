<?php
include_once("../conexion/conexion.php");
include_once("../clases/listarCompetidores.php");

$objetoCompetidor = new ListarCompetidores();

$nombre = $_GET['nombre'];
$idE = $_GET['idE'];
$ci = $_GET['ci'];
$sexo = $_GET['sexo'];
$fnac = $_GET['fnac'];


$objetoCompetidor->setCompetidor($ci, $nombre, $sexo, $fnac, $idE);
header("location: verCompetidores.php");

?>