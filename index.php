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
	<link href="paginas/css/style.css" rel="stylesheet">
	<title>S.I.G.T.</title>
	<link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
	<div class="cajaLogin">
    <div class="formLogin">
      <img src="paginas/images/sigticon.png" alt="">
      <form action="index.php" class="formLogin" method="post">
        <label for="usuario">Usuario</label> 
        <input type="text" id="usuario" name="user" required>
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="pass" required>
      
        <input type="submit" value="Ingresar" name="iniciar">
        <div id="error-message"></div>
        <div id="loading-message"></div>
    </form>

  </div>
</body>
</html>
