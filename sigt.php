<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>S.I.G.T.</title>
</head>
<header>
  <h1>LOGIN S.I.G.T.</h1>
</header>
<body>
    <form action="" method="post">
    <label for="nombre">Nombre de usuario:</label>
    <br>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>
    <label for="password">Contraseña:</label>
    <br>
    <input type="password" id="password" name="password" required>
    <br><br>
    <label for="tipo">Ingresa como:</label>
    <select id="tipo" name="tipo">
      <option value="juez">Juez</option>
      <option value="administrador">Administrador</option>
    </select>
    <br><br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>
