<?php 
session_start();
include_once("../clases/torneo.php");
require_once("../clases/login.php");
$objetoTorneo = new Torneo();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ver lista de torneos</h1>

    <?php $listar = $objetoTorneo->listarTorneos();?>
</body>
</html>