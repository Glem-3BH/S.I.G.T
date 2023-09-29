<?php

include_once("../clases/escuela.php");
$objetoEscuela = new Escuela();

if($_GET){

    $nombre=$_GET['nombre'];
    $localidad=$_GET['localidad'];
    $insertarEscuela = $objetoEscuela->insertarEscuela($nombre,$localidad);
    echo "<script>window.confirm('Escuela ingresada correctamente');</script>";  
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
    <h1>Ingresar escuela</h1>

    <form action="ingresarEscuela.php" method="GET">
        <label >Nombre</label>
        <input type="text" name="nombre">
        <label >Localidad</label>
        <input type="text" name="localidad">
        <input type="submit" name="Ingresar">
    </form>
</body>
</html>