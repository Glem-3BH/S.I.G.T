<?php
session_start();
require_once("../conexion/conexion.php");
require_once("../clases/login.php");

$user = $_GET['user'];
$_SESSION[$user] = $user;
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
    <link rel="stylesheet" href="css/style.css">
    <title>Información de tanteador</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
    <h1>En espera...</h1>

    <form action="estadoJuez.php" class="formulario2">
        <input hidden type="text" name="user" value="<?php echo $user ?>">
        <input type="submit" value="Puntuar">
    </form>
</body>
</html>