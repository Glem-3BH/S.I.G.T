<?php
include_once("../conexion/conexion.php");
include_once("../clases/torneo.php");

$objetoTorneo = new Torneo();

$id = $_GET['id'];

$objetoTorneo->getTorneo($id);

?>