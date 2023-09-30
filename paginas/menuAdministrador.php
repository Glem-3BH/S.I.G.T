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
    <link rel="stylesheet" href="css/style11.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Página Principal</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="sigtindex.html"><img src="images/sigticon.png" alt="" class="icono"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link disabled" aria-current="page" href="#">V.1.0</a>
              <a class="nav-link" href="#">CUK</a>
              <a class="nav-link" href="#">Contacto</a>
              <form action="menuAdministrador.php" method="POST">
                <input class="nav-link" type="submit" name="cerrar" value="LOGOUT"></input>
              </form>
            </div>
          </div>
        </div>
      </nav>
</header>
<body>
    <div class="carousel">
        <div class="carousel-item active">
          <img src="images/carrusel2.jpg" alt="Imagen 1" style="width: 400px; height: 200px;">
        </div>
        <div class="carousel-item">
          <img src="imagen2.jpg" alt="Imagen 2" style="width:100%;">
        </div>
        <div class="carousel-item">
          <img src="imagen3.jpg" alt="Imagen 3" style="width:100%;">
        </div>
      </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Competidores
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="verCompetidores.php">Ver competidores</a>
                    <a class="dropdown-item" href="inscribir.php">Ingresar nuevo competidor</a>
                    <a class="dropdown-item" href="#">Ver katas</a>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Escuelas
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="ingresarEscuela.php">Ingresar nueva escuela</a>
                    <a class="dropdown-item" href="verEscuelas.php">Ver escuelas</a>     
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Campeonatos
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                  <a class="dropdown-item" href="#">Ver campeonatos en curso</a>
                  <a class="dropdown-item" href="#">Ingresar nuevo campeonato</a>
                  <a class="dropdown-item" href="#">Ingresar kata a competidor</a>
                  <a class="dropdown-item" href="#">Historial de campeonatos</a>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Jueces
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                  <a class="dropdown-item" href="#">Ver jueces</a>
                  <a class="dropdown-item" href="#">Reglamentación jueces</a>
                  <a class="dropdown-item" href="#">Sanciones</a>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Soporte
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu5">
                  <a class="dropdown-item" href="#">Contacto</a>
                  <a class="dropdown-item" href="#">Reglas de la CUK</a>
                  <a class="dropdown-item" href="#">ABM Usuarios</a>
                  <a class="dropdown-item" href="#">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
<center>
    <a href="inscribir.php"><button class="boton-grande">Ingresar competidor</button></a>
    <a href="crearcamp.html"><button class="boton-grande">Crear nuevo campeonato</button></a>
    <a href="listakatas.html"><button class="boton-grande">Ver lista de katas</button></a>
    <a href="ingresarEscuela.php"><button class="boton-grande">Ingresar nueva escuela</button></a>
    <button class="boton-grande">Info del campeonato en curso</button>
    <a href="http://cuk.org.uy/reglamento-de-campeonatos-cuk/"><button class="boton-grande">Reglas de la CUK</button></a>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>