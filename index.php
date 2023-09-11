<?php 

require_once("conexion/conexion.php");
require_once("clases/login.php");
$objetoLogin = new Login();

if( isset($_POST["iniciar"])){

	$user=$_POST["user"];
	$pass=$_POST["pass"];
	$nuevoLogeo = $objetoLogin->loguearse($user,$pass);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="css/style11.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js">
	</script>
	<title>S.I.G.T.</title>
	<link rel="icon" type="image/jpg" href="paginas/images/sigticon.png"/>
</head>
<body>
	<header></header>
	<section class="vh-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 text-black">
					<br>
					<div class="px-5 ms-xl-4">
						<i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i> <span class="h1 fw-bold mb-0">BIENVENIDO A S.I.G.T.</span>
					</div>
					<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form style="width: 23rem;" action="index.php" method="POST">
							<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión</h3>
							<div class="form-outline mb-4">
								<input class="form-control form-control-lg" id="form2Example18" type="text" name="user" required> <label class="form-label" for="form2Example18">Nombre de usuario</label>
							</div>
							<div class="form-outline mb-4">
								<input class="form-control form-control-lg" id="form2Example28" type="password" name="pass" required> <label class="form-label" for="form2Example28">Contraseña</label>
							
							</div><br>
							<div class="pt-1 mb-4">
								<input class="btn btn-danger btn-lg btn-block" type="submit" name="iniciar" value="Ingresar"></input>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-6 px-0 d-none d-sm-block"><img alt="Login image" class="w-100 vh-100" src="paginas/images/sigtlogo.jpg" style="object-fit: cover; object-position: left;"></div>
			</div>
		</div>
	</section>
</body>
</html>
