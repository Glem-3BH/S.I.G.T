<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ticket</title>
    <link rel="icon" type="image/jpg" href="images/sigticon.png"/>
</head>
<body>
    

<header>
    <nav class="navegador">
        <div class="icono"><a class="navbar-brand" href="menuAdministrador.php?user=administrador"><img src="images/sigticon.png" alt="" class="icono"></a></div>
      <div class="btnNav">
        <div class="boton-3d">
          <div class="cara cara-frontal">COMPETIDOR</div>
          <div class="cara cara-trasera">
            <a href="verCompetidores.html">VER COMPETIDORES</a>
          </div>
          <div class="cara cara-trasera">
            <a href="ingcomp.html">INGRESAR COMPETIDOR</a>
          </div>
          <div class="cara cara-trasera">
            <a href="listakatas.html">VER KATAS</a>
          </div>
        </div>
        <div class="boton-3d">
          <div class="cara cara-frontal">ESCUELAS</div>
          <div class="cara cara-trasera">
            <a href="ingescuela.html">INGRESAR ESCUELA</a>
          </div>
          <div class="cara cara-trasera">
            <a href="verEscuela.html">VER ESCUELA</a>
          </div>
        </div>
        <div class="boton-3d">
          <div class="cara cara-frontal">TORNEOS</div>
          <div class="cara cara-trasera">
            <a href="iniciarTorneo.html">INICIAR TORNEO</a>
          </div>
          <div class="cara cara-trasera">
            <a href="juezTorneo.html">VER TORNEO EN CURSO</a>
          </div>
        </div>
        <div class="boton-3d">
          <div class="cara cara-frontal">SOPORTE</div>
          <div class="cara cara-trasera">
            <a href="#">MANUAL DE USUARIO</a>
          </div>
          <div class="cara cara-trasera">
            <a href="#">CREAR TICKET</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
<div class="cajaform">
    <div class="formularios">
      <form action="#" class="formularios">
        <label for="CI">Nombre y apellido</label> 
        <input type="text" id="nombre" name="nombre" required>
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" required>
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" required>
        <label for="prioridad">Prioridad (BAJA - MEDIA - ALTA)</label>
        <input type="text" id="prioridad" name="prioridad" required>
        <button type="button" id="enviar">Enviar</button>
      </form>
    </div>
  </div>
</body>