<?php
include_once("../clases/evento.php");
include_once("../clases/listarCompetidores.php");
$objetoCompetidor = new ListarCompetidores;
$objetoEvento = new Evento;


$resultado = $objetoEvento->mejorCompetidor();

$ci = $resultado['CI'];
$puntaje = $resultado['MejorCompetidorPuntaje'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Ganador</h1>
    <?php $datosDelCompetidor = $objetoCompetidor->seleccionarCompetidor($ci,$puntaje); ?>
</body>
</html>