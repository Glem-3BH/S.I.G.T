<?php
include_once("../conexion/conexion.php");
include_once("../clases/listarCompetidores.php");
$objetoCompetidor = new ListarCompetidores();
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
  <h1>Modificar Competidor</h1>
  <?php $mostrar = $objetoCompetidor->getCompetidor($id);?>

    
</body>
</html>



