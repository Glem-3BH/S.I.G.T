<?php
require_once("../clases/ingresarCompetidor.php");
require_once("../conexion/conexion.php");
$objetoCompetidor = new Competidor();

if( isset($_POST["inscribir"])){

    $ci=$_POST["ci"];
    $idE=$_POST["idE"];
    $nombre=$_POST["nombre"];
    $sexo=$_POST["sexo"];
    $fnac=$_POST["fnac"];
    $edad=$_POST["edad"];
    $insert = $objetoCompetidor->insertarCompetidor($ci,$idE,$nombre,$sexo,$fnac,$edad);
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
    <h1>Inscribir competidor</h1>
    <form action="inscribir.php" method="POST">
        <label for="">CI</label>
        <input type="number" name="ci">
        <label for="">ID Escuela</label>
        <input type="number" name="idE">
        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <label for="">Genero</label>
        <input type="text" name="sexo">
        <label for="">Fecha de nacimiento</label>
        <input type="date" name="fnac">
        <label for="">Edad</label>
        <input type="text" name="edad">
        <input type="submit" value="inscribir" name="inscribir">
    </form>
</body>
</html>