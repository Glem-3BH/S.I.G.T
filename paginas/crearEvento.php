<?php
include_once("../clases/evento.php");

$objetoEvento = new Evento();

$idTorneo = $_GET['id'];
$competidor = $_GET['competidor'];
$sexo;
$etapa = "Final";
$pool = $_GET['pool'];
$edad; 
$kata = $_GET['kata'];
$tipo = "Individual";
$idG = 1;

$resultado = $objetoEvento->categoriaTorneo($idTorneo);
list($edad, $sexo) = $resultado;
$ingresarEvento = $objetoEvento->insertarEvento($idTorneo,$competidor,$idG,$etapa,$pool,$edad,$sexo,$tipo,$kata);

header("location: iniciarTorneo.php?id=$idTorneo");

?>
