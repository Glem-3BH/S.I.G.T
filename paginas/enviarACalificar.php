<?php
include_once("../clases/listarCompetidores.php");

$objetoCompetidor = new ListarCompetidores();

$idTorneo = $_GET['id'];
$competidor = $_GET['competidor'];


$cambiarEstado = $objetoCompetidor->cambiarEstado($competidor);

header("location: iniciarTorneo.php?id=$idTorneo");

?>


