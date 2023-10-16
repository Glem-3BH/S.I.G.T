<?php
include_once("../clases/evento.php");
$objetoEvento = new Evento();
$idTorneo = $_GET['id'];
$competidor = $_GET['competidor'];
$pool = $_GET['pool'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Kata</title>
</head>
<body>
    

    <form action="crearEvento.php">
        <input type="text" value="<?php echo $idTorneo ?>" name="id" hidden>
        <input type="text" value="<?php echo $competidor ?>" name="competidor" hidden>
        <input type="text" value="<?php echo $pool ?>" name="pool" hidden>
        <select name="kata">
            <?php $listar = $objetoEvento->selectDeKata(); ?>
        </select>
        <input type="submit" value="Seleccionar">
    </form>
</body>
</html>