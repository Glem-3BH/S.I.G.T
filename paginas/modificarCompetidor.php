<?php
include_once("../conexion/conexion.php");
include_once("../clases/listarCompetidores.php");
include_once("../clases/torneo.php");
include_once("../clases/escuela.php");
$objetoCompetidor = new ListarCompetidores();
$objetoEscuela = new Escuela();
$objetoTorneo = new Torneo();
$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style11.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
    <title>Ingresar Competidor</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
    <title>Modificar Competidor</title>
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
      </header><br><br><br><br><br><br>
  <h1>Modificar Competidor</h1>
  <?php $mostrar = $objetoCompetidor->getCompetidor($id);?>

    
</body>
</html>



