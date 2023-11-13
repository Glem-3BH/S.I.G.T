<?php

include_once("../clases/torneo.php");
$objetoTorneo = new Torneo();

if($_GET){

    $nombre=$_GET['nombre'];
    $fecha=$_GET['fecha'];
    $direccion=$_GET['direccion'];
    $categoria=$_GET['categoria'];
    $sexo=$_GET['sexo'];
    $insertarTorneo = $objetoTorneo->insertarTorneo($nombre,$fecha,$direccion,$categoria,$sexo);
    echo "<script>window.confirm('Torneo ingresada correctamente');</script>";  
}

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
      <form action="crearTorneo.php" class="formularios"  method="GET">
        <label for="CI">Nombre</label> 
        <input type="text" id="nombre" name="nombre" required>
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" required>
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" required>
        <div class="radio">
          <select name="categoria" id="Categoria">
            <option value="" disabled selected>Seleccione categoría</option>
            <option value="12/13" >12/13</option>
            <option value="14/15" >14/15</option>
            <option value="16/17" >16/17</option>
            <option value="+18" >+18</option>
          </select>
          <input type="radio" id="M" name="sexo" value="M" checked>
          <label for="M">Masculino</label> 
          <input type="radio" id="F" name="sexo" value="F">
          <label for="F">Femenino</label>
        </div> 
        <input type="submit" id="ingreso" name="Ingresar"></input>
    </div>
  </div>
    </form>
</body>
</html>