<?php 
session_start();
include_once("../clases/escuela.php");
require_once("../clases/login.php");
$objetoEscuela = new Escuela();
$objetoLogin = new Login();
$validar = $_SESSION['administrador'];
if($validar == null || $validar == ''){
    session_destroy();
    header("location: ../index.php");
}
if(isset($_POST["cerrar"])){
    $nuevoDeslogueo = $objetoLogin->cerrarSesion($_SESSION['administrador']);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ver Escuela</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
</head>
<body>
  <header>
    <nav class="navegador">
        <div class="icono"><a class="navbar-brand" href="sigtindex.html"><img src="images/sigticon.png" alt="" class="icono"></a></div>
      <div class="btnNav">
        <div class="boton-3d">
          <div class="cara cara-frontal">COMPETIDOR</div>
          <div class="cara cara-trasera">
            <a href="verCompetidores.html">VER COMPETIDORES</a>
          </div>
          <div class="cara cara-trasera">
            <a href="ingcomp.html">INGRESAR COMPETIDOR</a>
          </div>
          <div class="cara cara-trasera">
            <a href="listakatas.html">VER KATAS</a>
          </div>
        </div>
        <div class="boton-3d">
          <div class="cara cara-frontal">ESCUELAS</div>
          <div class="cara cara-trasera">
            <a href="ingescuela.html">INGRESAR ESCUELA</a>
          </div>
          <div class="cara cara-trasera">
            <a href="verEscuela.html">VER ESCUELA</a>
          </div>
        </div>
        <div class="boton-3d">
          <div class="cara cara-frontal">TORNEOS</div>
          <div class="cara cara-trasera">
            <a href="iniciarTorneo.html">INICIAR TORNEO</a>
          </div>
          <div class="cara cara-trasera">
            <a href="juezTorneo.html">VER TORNEO EN CURSO</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <?php $listar = $objetoEscuela->listarEscuela();?>

</html>
