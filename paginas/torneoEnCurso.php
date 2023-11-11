<?php
include_once("../conexion/conexion.php");
include_once("../clases/torneo.php");

$objetoTorneo = new Torneo();



$torneo = $objetoTorneo->competidorCalificando();
header("location: iniciarTorneo.php?id=".$torneo."&iniciar=iniciar");

?>