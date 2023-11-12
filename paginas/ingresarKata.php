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
    <link rel="stylesheet" href="css/style.css">
    <title>Información de tanteador</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
    <h1>SELECCIONE UN KATA</h1>
    <div class="seleccionarKata">
        <form action="crearEvento.php">
            <input type="text" value="<?php echo $idTorneo ?>" name="id" hidden>
            <input type="text" value="<?php echo $competidor ?>" name="competidor" hidden>
            <input type="text" value="<?php echo $pool ?>" name="pool" hidden>
            <select name="kata">
                <?php $listar = $objetoEvento->selectDeKata(); ?>
            </select><br><br><br><br>
            <input type="submit" value="Seleccionar" >
        </form>
    </div>
</body>
</html>