<?php
include_once("../conexion/conexion.php");
include_once("../clases/torneo.php");

$objetoTorneo = new Torneo();

$id = $_GET['id'];



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Crear Campeonato</title>
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
                <a href="crearTorneo.php">CREAR TORNEO</a>
              </div>
              <div class="cara cara-trasera">
                <a href="verTorneos.php">VER TORNEOS</a>
              </div>
              <div class="cara cara-trasera">
                <a href="torneoEnCurso.php">TORNEO EN CURSO</a>
              </div>
            </div>
          </div>
        </nav>
      </header><br><br>
  <div class="cajaform">
    <div class="formularios">
      <?php $objetoTorneo->getTorneo($id); ?>
    </div>
  </div>
    
</body>
</html>