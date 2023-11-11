<?php
session_start();
require_once("../conexion/conexion.php");
require_once("../clases/login.php");
require_once("../clases/ingresarCompetidor.php");
require_once("../clases/torneo.php");
require_once("../clases/escuela.php");
$objetoCompetidor = new Competidor();
$objetoTorneo = new Torneo();
$objetoEscuela = new Escuela();

if($_POST){

    $ci=$_POST["ci"];
    $nombre=$_POST["nombre"];
    $sexo=$_POST["sexo"];
    $fnac=$_POST["fnac"];
    $idE=$_POST["idE"];
    $idtorneo=$_POST["IdTorneo"];
    $estado=$_POST["estado"];
    $insert = $objetoCompetidor->insertarCompetidor($ci,$nombre,$sexo,$fnac,$idE,$idtorneo,$estado);
    echo "<script>window.confirm('Competidor ingresado correctamente')</script>";
}

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
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
    <title>Ingresar Competidor</title>
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
      </header><br><br>
  <div class="cajaform">
    <div class="formularios">
      <form action="inscribir.php" class="formularios" method="POST">
        <label for="nombre">Nombre y apellido</label> 
        <input type="text" id="nombre" name="nombre" required>
        <label for="ci">Documento</label>
        <input type="number" id="cedula" name="ci" required>
        <label for="fnac">Fecha de nacimiento</label>
        <input type="date" name="fnac" id="fecha" required>
        <div class="radio">
          <select name="idE" id="escuela">
            <option value="" disabled selected>Seleccione escuela</option>
            <?php $listarEsc = $objetoEscuela->selectDeEscuelas();?>
          </select>
          
          <select name="IdTorneo" id="torneo">Seleccione torneo
            <option value="" disabled selected>Seleecione torneo</option>
            <?php $listar = $objetoTorneo->selectDeTorneos();?>
          </select>
          <input type="radio" id="F" name="sexo" value="F">
          <label for="F">Femenino</label>
          <input type="radio" id="M" name="sexo" value="M">
          <label for="M">Masculino</label> 
        </div>
        <input type="hidden" name="estado" value="calificar">
        <input type="submit" id="ingreso" value="inscribir" name="inscribir"></input> 
      </form>
    </div>
    
  </div>
   

    <script>
      // Obtenemos una referencia al botón
      var boton = document.getElementById("ingreso");
      
      // Agregamos un evento click al botón
      boton.addEventListener("click", function() {
          // Mostramos un mensaje de respuesta
          alert("Participante ingresado correctamente");
      });
  </script>
</body>
</html>