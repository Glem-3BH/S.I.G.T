<?php
session_start();

include_once("../clases/evento.php");
include_once("../clases/listarCompetidores.php");
include_once("../clases/login.php");
$objetoCompetidor = new ListarCompetidores;
$objetoEvento = new Evento;
$objetoLogin = new Login();
$validar = $_SESSION['administrador'];
if($validar == null || $validar == ''){
    session_destroy();
    header("location: ../index.php");
}
if(isset($_POST["cerrar"])){
    $nuevoDeslogueo = $objetoLogin->cerrarSesion($_SESSION['administrador']);
}
$resultado = $objetoEvento->mejorCompetidor();

$ci = $resultado['CI'];
$puntaje = $resultado['MejorCompetidorPuntaje'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pantalla Publico</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
    

<h1>CONFEDERACIÓN URUGUAYA DE KATARE</h1>
    <div class="tanteador">
<table border="1">
    <tr>
        <th colspan="3">Convocatoria</th>
    </tr>
    <tr>
        <th colspan="3">ROUND # - CATEGORÍA: #</th>
    </tr>
    <tr>
       <th>Pool 2</th>
        <th>Nombre</th> 
        <th>Kata</th>
    </tr>
    <tr>
        <td><img src="images/ROJO.svg" alt="" class="pools"></td>
        <td id="infoComp">Mauro Ferrero</td>
        <td id="infoComp">Kanchin</td>
    </tr>
</table>
    </div>

</body>
</html>