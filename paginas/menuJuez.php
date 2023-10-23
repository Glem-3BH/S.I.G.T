<?php
session_start();
require_once("../conexion/conexion.php");
require_once("../clases/login.php");

$user = $_GET['user'];

$idesc = $_GET['idesc'];
$idtorneo = $_GET['idtorneo'];
$ci = $_GET['ci'];
$etapa = $_GET['etapa'];
$color = $_GET['color'];
$categoria = $_GET['categoria'];
$sexo = $_GET['sexo'];
$tipo = $_GET['tipo'];
$idkata = $_GET['idkata'];
$nombre = $_GET['nombre'];
$nombreKata = $_GET['nombrekata'];
$nombreEsc = $_GET['nombreesc'];

$objetoLogin = new Login();
$validar = $_SESSION[$user];
if($validar == null || $validar == ''){
    session_destroy();
    header("location: ../index.php");
}
if(isset($_POST["cerrar"])){
    $nuevoDeslogueo = $objetoLogin->cerrarSesion($_SESSION[$user]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calificar</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
    
    <div class="cajaCalificar">
        <div class="datos-calificar">
            <table border="1">
                <caption>Participante</caption>
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>ESCUELA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nombre?></td>
                        <td><?php echo $nombreEsc?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>CATEGORÍA</th>
                        <th>KATA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $categoria?></td>
                        <td><?php echo $nombreKata?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <div class="score-button">
            <div class="score-selector">
                <div class="score-display">5.0</div>
                <div class="score-range" 
                    onmousemove="updateScore(event.clientX - scoreRange.getBoundingClientRect().left)" 
                    ontouchmove="updateScore(event.touches[0].clientX - scoreRange.getBoundingClientRect().left)">
                    <div class="score-marker" style="left: 0;"></div>
                    <!-- Agrega más marcadores de puntuación aquí si lo deseas -->
                </div>
            </div>
            <form id="calificacionForm" action="tuscript.php" method="get">
                <input type="hidden" name="calificacion" id="calificacionField" value="5.0">
                <input type="hidden" name="idJ" value="a">
                <input type="hidden" name="idE" value="b">
                <input type="hidden" name="idKata" value="b">
                <button type="button" onclick="enviarCalificacion()">Enviar</button>
            </form>
        </div>
        
        <script>
            // Obtener elementos del DOM
            const scoreDisplay = document.querySelector(".score-display");
            const scoreMarker = document.querySelector(".score-marker");
            const scoreRange = document.querySelector(".score-range");
            const calificacionField = document.getElementById("calificacionField");
        
            // Establecer valor inicial
            let scoreValue = 5.0;
            calificacionField.value = scoreValue;
        
            // Función para actualizar el marcador y el valor mostrado
            function updateScore(x) {
                if (x <= 0) {
                    scoreValue = 0.0;
                } else {
                    scoreValue = 5 + (x / scoreRange.offsetWidth) * 5;
                    scoreValue = parseFloat(scoreValue.toFixed(1)); // Redondear a una décima
                }
                scoreDisplay.textContent = scoreValue;
                scoreMarker.style.left = `${x}px`;
                calificacionField.value = scoreValue; // Actualizar el valor del campo oculto
            }
        
            // Función para enviar el formulario
            function enviarCalificacion() {
                const form = document.getElementById("calificacionForm");
                form.submit();
            }
        </script>
</body>
</html>