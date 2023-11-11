<?php
session_start();
require_once("../conexion/conexion.php");
require_once("../clases/login.php");

$user = $_GET['user'];

$objetoLogin = new Login();
$validar = $_SESSION[$user];
if($validar == null || $validar == ''){
    session_destroy();
    header("location: ../index.php");
}
if(isset($_POST["cerrar"])){
    $nuevoDeslogueo = $objetoLogin->cerrarSesion($_SESSION[$user]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Administrador</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
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
                <a href="listarKatas.php">VER KATAS</a>
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
                <a href="verTorneos.php">VER TORNEOS</a>
              </div>
              <div class="cara cara-trasera">
                <a href="torneoEnCurso.php">TORNEO EN CURSO</a>
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
          <form action="menuAdministrador.php" method="POST">
                <input class="nav-link" type="submit" name="cerrar" value="LOGOUT"></input>
              </form>
        </nav>
      </header>
<div class="contenedor">
    <div class="cajaGestion">
        <h2>INGRESAR COMPETIDOR</h2>
        <a href="inscribir.php">
            <img src="images/person.svg" alt="Imagen 1">
        </a>
        <p>Aquí podrá inscribir a un nuevo competidor</p>
    
    </div>
    <div class="cajaGestion">
        <h2>NUEVO TORNEO</h2>
        <a href="crearTorneo.php">
            <img src="images/cup.svg" alt="Imagen 2">
        </a>
        <p>Aquí podrá crear un <br> nuevo torneo</p>
    </div>
    <div class="cajaGestion">
        <h2>INGRESAR ESCUELA</h2>
        <a href="ingresarEscuela.php">
            <img src="images/school.svg" alt="Imagen 3">
        </a>
        <p>Aquí podrá inscribir a una <br> nueva escuela</p>
    </div>
    <div class="cajaGestion">
        <h2>COMPARTIR PANTALLA</h2>
        <a href="llamadoCompetidores.html">
            <img src="images/share.svg" alt="Imagen 4">
        </a>
        <p>Aquí podrá compartir pantalla con el público</p>
    </div>
</div>
</body>

<!--
  <form action="menuAdministrador.php" method="POST">
                <input class="nav-link" type="submit" name="cerrar" value="LOGOUT"></input>
              </form>
-->
</html>