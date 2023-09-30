<?php
include_once("../conexion/conexion.php");
include_once("../clases/escuela.php");

$objetoEscuela = new Escuela();

$id = $_GET['id'];

$objetoEscuela->getEscuela($id);
?>