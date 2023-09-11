<?php
session_start();
require_once("../conexion/conexion.php");
require_once("../clases/login.php");
require_once("../clases/ingresarCompetidor.php");
$objetoCompetidor = new Competidor();

if( isset($_POST["inscribir"])){

    $ci=$_POST["ci"];
    $nombre=$_POST["nombre"];
    $sexo=$_POST["sexo"];
    $fnac=$_POST["fnac"];
    $idE=$_POST["idE"];
    $insert = $objetoCompetidor->insertarCompetidor($ci,$nombre,$sexo,$fnac,$idE);
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
  <h1>Nuevo competidor</h1>
    <button class="import">Importar desde archivo</button>

    <section class="vh-10 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Ingrese nuevo competidor manualmente:</h3>
                  
                  <form action="inscribir.php" method="POST">
                    <div class="row">
                      <div class="col-md-12 mb-4">
      
                        <div class="form-outline">
                          <label class="form-label" for="name">Nombre Completo</label>
                          <input type="text" id="name" class="form-control form-control-lg" name="nombre" />
                        </div>

      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <label for="birthdayDate" class="form-label">Fecha de Nacimiento</label>
                          <input type="date" class="form-control form-control-lg" id="birthdayDate" name="fnac"/>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <h6 class="mb-2 pb-1">Género: </h6>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" id="femaleGender"
                            value="F" checked />
                          <label class="form-check-label" >Mujer</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" id="maleGender"
                            value="M" />
                          <label class="form-check-label" >Hombre</label>
                        </div> 
                      </div>
                    </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="ci">C.I.</label>
                          <input type="tel" id="ci" name="ci" class="form-control form-control-lg" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="ci" >Escuela</label>
                          <input type="number" id="ci" name="idE" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>
                      <input class="btn btn-danger btn-lg" type="submit" value="inscribir" name="inscribir" />
                    </div>
      
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>