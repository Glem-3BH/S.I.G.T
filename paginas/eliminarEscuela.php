<?php

    include_once("../conexion/conexion.php");
    include_once("../clases/escuela.php");

    $objetoEscuela = new Escuela();

    $eliminar = $_GET["id"];
    $eliminarEscuela = $objetoEscuela->eliminarEscuela($eliminar);
    header("location: verEscuelas.php");
?>