<?php

include_once("../clases/torneo.php");
$objetoTorneo = new Torneo();

if($_GET){

    $nombre=$_GET['nombre'];
    $fecha=$_GET['fecha'];
    $direccion=$_GET['direccion'];
    $categoria=$_GET['categoria'];
    $insertarTorneo = $objetoTorneo->insertarTorneo($nombre,$fecha,$direccion,$categoria);
    echo "<script>window.confirm('Torneo ingresada correctamente');</script>";  
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
    <h1>Ingresar Torneo</h1>

    <form action="crearTorneo.php" method="GET">
        <label >Nombre</label>
        <input type="text" name="nombre">
        <label >Fecha</label>
        <input type="date" name="fecha">
        <label >Direcion</label>
        <input type="text" name="direccion">
        <label >Categoria</label>
        <select name="categoria">
            <option value="12/13" >12/13</option>
            <option value="14/15" >14/15</option>
            <option value="16/17" >16/17</option>
            <option value="+18" >+18</option>
        </select>
        <input type="submit" name="Ingresar">
    </form>
</body>
</html>