<?php

include_once("../clases/escuela.php");
$objetoEscuela = new Escuela();

if($_GET){

    $nombre=$_GET['nombre'];
    $localidad=$_GET['localidad'];
    $insertarEscuela = $objetoEscuela->insertarEscuela($nombre,$localidad);
    echo "<script>window.confirm('Escuela ingresada correctamente');</script>";  
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nueva Escuela</title>
    <link rel="icon" type="image/jpg" href="sigticon.png"/>
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
  <br><br><br><br><br><br><br><br> 
    <h1>Nueva escuela</h1>
    <div class="cajaformEsc">
      <div class="formularios">
        <form action="#" class="formularios">
          <label for="nombre">Nombre</label> 
          <input type="text" id="nombre" name="nombre" required>
          <label for="localidad">Localidad</label>
          <input type="text" id="cedula" name="localidad" required>
          <input type="submit" name="Ingresar" id="ingreso">
      </div>
    </div>
      </form>
</body>
</html>