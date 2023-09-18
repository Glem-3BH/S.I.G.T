<?php

    include_once("../conexion/conexion.php");
    include_once("../clases/listarCompetidores.php");

    $objetoCompetidor = new ListarCompetidores();

    $eliminar = $_GET["competidor"];
    $nuevoEliminado = $objetoCompetidor->eliminarCompetidor($eliminar);
    header("location: verCompetidores.php");

?>