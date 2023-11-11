<?php 
session_start();
include_once("../clases/torneo.php");
require_once("../clases/login.php");
$objetoTorneo = new Torneo();
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
    <title>Torneos</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
<header>
        <nav class="navegador">
            <div class="icono"><a class="navbar-brand" href="menuAdministrador.php?user=administrador"><img src="images/sigticon.png" alt="" class="icono"></a></div>
          <div class="btnNav">
            <div class="boton-3d">
              <div class="cara cara-frontal">COMPETIDOR</div>
              <div class="cara cara-trasera">
                <a href="verCompetidores.php">VER COMPETIDORES</a>
              </div>
              <div class="cara cara-trasera">
                <a href="inscribir.php">INGRESAR COMPETIDOR</a>
              </div>
              <div class="cara cara-trasera">
                <a href="listakatas.html">VER KATAS</a>
              </div>
            </div>
            <div class="boton-3d">
              <div class="cara cara-frontal">ESCUELAS</div>
              <div class="cara cara-trasera">
                <a href="ingresarEscuela.php">INGRESAR ESCUELA</a>
              </div>
              <div class="cara cara-trasera">
                <a href="verEscuelas.php">VER ESCUELA</a>
              </div>
            </div>
            <div class="boton-3d">
              <div class="cara cara-frontal">TORNEOS</div>
              <div class="cara cara-trasera">
                <a href="seleccionarTorneo.php">INICIAR TORNEO</a>
              </div>
              <div class="cara cara-trasera">
                <a href="juezTorneo.html">TORNEO EN CURSO</a>
              </div>
            </div>
            <div class="boton-3d">
              <div class="cara cara-frontal">SOPORTE</div>
              <div class="cara cara-trasera">
                <a href="#">MANUAL DE USUARIO</a>
              </div>
              <div class="cara cara-trasera">
                <a href="#">CREAR TICKET</a>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <div class="selTorneo">
        <form action="iniciarTorneo.php" method="GET">
          <h1>Iniciar un torneo</h1>
            <select name="id">
              <option value="">Seleccione un torneo</option>
              <?php $listar = $objetoTorneo->selectDeTorneos();?>
            </select>
            <button type="submit" value="iniciar" name="iniciar">Iniciar</button>
        </form>
      </div>
</html>