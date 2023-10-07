<?php

    include_once("../conexion/conexion.php");
    include_once("../clases/torneo.php");

    $objetoTorneo = new Torneo();

    $eliminar = $_GET["id"];
    $eliminarTorneo = $objetoTorneo->eliminarTorneo($eliminar);
    header("location: verTorneos.php");
?>