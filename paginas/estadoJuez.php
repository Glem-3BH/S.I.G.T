<?php
session_start();
include_once("../clases/juez.php");
require_once("../conexion/conexion.php");
require_once("../clases/login.php");

$user = $_GET['user'];
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


$verSiHay = $objetoJuez->calificando();

$paraCalificar = $objetoJuez->consultarEstado();

if($verSiHay == true){
    if($paraCalificar > 0){
    
    $ide = $paraCalificar['IdE'];
    $idtorneo = $paraCalificar['IdTorneo'];
    $ci = $paraCalificar['CI'];
    $etapa = $paraCalificar['Etapa'];
    $color = $paraCalificar['Color'];
    $categoria = $paraCalificar['Edad'];
    $sexo = $paraCalificar['Sexo'];
    $tipo = $paraCalificar['Tipo'];
    $idkata = $paraCalificar['IdKata'];
    $nombre = $paraCalificar['NombreCompetidor'];
    $nombreKata = $paraCalificar['NombreKata'];
    $nombreEsc = $paraCalificar['NombreEscuela'];

    header('location: menuJuez.php?user='.$user.'&ide='.$ide.'&idtorneo='.$idtorneo.'&ci='.$ci.'&etapa='.$etapa.'&color='.$color.'&categoria='.$categoria.'&sexo='.$sexo.'&tipo='.$tipo.'&idkata='.$idkata.'&nombre='.$nombre.'&nombrekata='.$nombreKata.'&nombreesc='.$nombreEsc.'');
    }else{
        header('location: enEsperaJuez.php?user='.$user); 
    }
}

//header('location: enEsperaJuez.php?user='.$user);

//consulta que trae los datos de ese competidor que esta en calificando

//lo envio a la pantalla de puntuar desde acá
?>

