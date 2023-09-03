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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="index.php" method="POST">
        <h3>Login de usuario</h3>
        <label for="">Usuario:</label>
        <input type="text" name="user" required>
        <br>
        <br>
        <label for="">Password:</label>
        <input type="text" name="pass" required>
        <br>
        <input type="submit" name="iniciar" value="Ingresar">
    </form>

</body>
</html>
