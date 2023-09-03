<?php 
include_once("../clases/listarCompetidores.php");
$objetoCompetidor = new ListarCompetidores();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $listar = $objetoCompetidor->listar();?>
</body>
</html>
