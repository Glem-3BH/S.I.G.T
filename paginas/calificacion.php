<?php
session_start();
include_once("../clases/juez.php");
require_once("../conexion/conexion.php");
require_once("../clases/login.php");

$user = $_GET['user'];
$ci = $_GET['ci'];
$idE = $_GET['idE'];
$idj = $_GET['idJ'];
$idkata = $_GET['idKata'];
$puntaje = $_GET['calificacion'];

$objetoJuez = new Juez();
$objetoLogin = new Login();
$validar = $_SESSION[$user];
if($validar == null || $validar == ''){
    session_destroy();
    header("location: ../index.php");
}
if(isset($_POST["cerrar"])){
    $nuevoDeslogueo = $objetoLogin->cerrarSesion($_SESSION[$user]);

}

$calificacionDeJuez = $objetoJuez->calificar($idj,$idE,$idkata,$puntaje);

$estado = $objetoJuez->calificado($idE);

if($estado == 7){

   $cambio = $objetoJuez->cambioDeEstado($ci);
}

header("location: enEsperaJuez.php?user=".$user);

?>