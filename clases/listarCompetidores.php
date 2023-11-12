<?php
include_once("../conexion/conexion.php");
include_once("torneo.php");
include_once("escuela.php");
$objetoEscuela = new Escuela();
$objetoTorneo = new Torneo();
class ListarCompetidores extends Conexion {

    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }


    public function listar(){

        try{
            $sql = "SELECT * FROM competidor";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
        echo '<div class="tanteador">
              <table border="1">
              <caption>MOSTRANDO COMPETIDORES</caption>';
        echo '<thead><tr><th>Cedula</th><th>Nombre</th><th>Genero</th><th>F.Nacimiento</th><th>Id Escuela</th><th>Id Torneo</th><th colspan="2">Acciones</th></tr></thead>';
        echo '<tbody>';
        foreach ($insert as $row){
            echo '<tr>
                    <td>'.$row['CI'].'</td>
                    <td>'.$row['Nombre'].'</td>
                    <td>'.$row['Sexo'].'</td>
                    <td>'.$row['F_Nac'].'</td>
                    <td>'.$row['IdEsc'].'</td>
                    <td>'.$row['IdTorneo'].'</td>
                    <td>
    
                        <a href="eliminarCompetidor.php?competidor='.$row['CI'].'">Eliminar</a>
                        
                    </td>
                    <td>
                    <a href="modificarCompetidor.php?id='.$row['CI'].'">Editar</a>
                    </td>
                  </tr>';
             
        }
        echo '</tbody>
            </table>
            </div>';
        
    }

    public function eliminarCompetidor($id) {
        $consulta = "DELETE FROM competidor WHERE CI = :id";
        
        try {
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true; 
        } catch (PDOException $ex) {
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            return false; 
        }
    }

    public function getCompetidor($id){
      try {
          $sql = "SELECT * FROM competidor WHERE CI = :id";
          $insert = $this->conexion->prepare($sql);
          $insert->bindParam(':id', $id, PDO::PARAM_INT);
          $arrData = array($insert);
          $resInsert = $insert->execute(); 
      } catch(PDOException $ex) {
          echo "Ocurrio un error<br>";
          echo $ex->getMessage();
          exit;
      }
  
      foreach ($insert as $row) {
          echo '
          <div class="cajaform">
              <div class="formularios">
                  <form action="actualizarCompetidor.php" class="formularios" method="GET">
                      <label for="nombre">Nombre y apellido</label> 
                      <input type="text" id="nombre" name="nombre" value="'.$row['Nombre'].'" required>
                      <label for="ci">Documento</label>
                      <input type="number" id="cedula" name="ci" value="'.$row['CI'].'" required>
                      <label for="fnac">Fecha de nacimiento</label>
                      <input type="date" name="fnac" id="fecha" value="'.$row['F_Nac'].'" required>
                      <div class="radio">
                          <input type="radio" id="F" name="sexo" value="F">
                          <label for="F">Femenino</label>
                          <input type="radio" id="M" name="sexo" value="M">
                          <label for="M">Masculino</label> 
                      </div>
                      <input type="hidden" name="estado" value="calificar">
                      <input type="submit" id="ingreso" value="actualizar" name="Actualizar"></input> 
                  </form>
              </div>
          </div>';
      }
  }

    public function setCompetidor(string $ci, string $nombre, string $sexo, string $fnac){

        $actualizar = "UPDATE competidor set Nombre=:nombre, Sexo=:sexo, F_Nac=:fnac WHERE CI=:ci";

        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bindParam(':ci', $ci, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':fnac', $fnac, PDO::PARAM_STR);

        $stmt->execute();

    }


    
    public function listarParaTorneo($id){
      $competidores = 0;
      $categoria ="";
      $genero ="";
      $idtorneo="";
      try{
        $sql = "SELECT * FROM competidor WHERE IdTorneo = :id";
        $insert = $this->conexion->prepare($sql);
        $insert->bindParam(':id', $id, PDO::PARAM_INT);
        $insert2 = $this->conexion->prepare($sql);
        $insert2->bindParam(':id', $id, PDO::PARAM_INT);
        $arrData = array($insert);
        $resInsert = $insert->execute(); 
        $resInsert = $insert2->execute(); 
    }catch(PDOException $ex){
        echo "Ocurrio un error<br>";
        echo $ex->getMessage();
        exit;
    }

    foreach($insert as $row){
      $competidores = $competidores + 1;
    }

    if($competidores >= 2 && $competidores <= 3){

      $pool = "AKA";
      $categoria ="";
      $genero ="";
      $nombreTorneo="";

      try {
        $sql2 = "SELECT Sexo, Categoria, Nombre FROM torneo WHERE IdTorneo = :id";
        $stmt = $this->conexion->prepare($sql2);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un torneo con el IdTorneo proporcionado
        if ($resultado) {
            $categoria = $resultado['Categoria'];
            $genero = $resultado['Sexo'];
            $nombreTorneo = $resultado['Nombre'];
        } 

    } catch(PDOException $ex) {
        echo "Ocurrió un error<br>";
        echo $ex->getMessage();
        return null; // Manejar el error según sea necesario
    }
      
      echo '<div class="tanteador">';
      echo '<table border=1>';
      echo '<caption>MOSTRANDO COMPETIDORES</caption>';
      echo '<thead>';
      echo '<tr>
      <th colspan="5">CATEGORÍA: '.$categoria.' | GÉNERO: '.$genero.' | TORNEO: '.$nombreTorneo.'</th>
      </tr>
      </thead>
      <tbody>';
    
      echo '<tr><th>Nombre</th><th>Id Escuela</th><th>Pool</th><th>Acciones</th><th>Estado</th></tr>';
      foreach ($insert2 as $row){
          echo '<tr>
                  <td>'.$row['Nombre'].'</td>
                  <td>'.$row['IdEsc'].'</td>
                  <td>'.$pool.'</td>
                  <td>
                  <a href="ingresarKata.php?competidor='.$row['CI'].'&id='.$row['IdTorneo'].'&pool='.$pool.' ">Ingresar Kata</a>
                  </td>
                  <td>
                  <a href="enviarACalificar.php?competidor='.$row['CI'].'&id='.$row['IdTorneo'].' ">'.$row['Estado'].'</a>    
                  </td>
                </tr>';
          
      }
      echo '</table>';
      echo '</tbody>';
      echo '</div>';

      //meter boton que diga ver resultado final y mandar a la tabla de resultado
      //acá todos tienen el mismo color


    }else if($competidores = 4){

      //Son dos grupos de dos, dos AKA y dos AO
      //Ganador de cada color se enfrenta a para 1er y 2do (por el oro)
      //Pededores quedan con 3er puesto pero no hacen otro kata
    

    }else if($competidores >= 5 && $competidores <= 10){

      //Son dos grupos y hay dos katas para la victoria
      //En la segunda vuelta 1ro contra 1ro (ganador Oro, perdedor, plata)
      //2do contra 3ro (Ganador bronce, perdedor 5to) 
      //3ro contra 2do (Ganador bronce, perdedor 5to)

    }else if($competidores >= 11 && $competidores <= 24){

      //son dos grupos, de los cuales pasan la mitad de cada grupo(primer kata)
      //la mitad vuelve a hacer otro kata y los 3 mejores pasan a realizar el ultimo Kata
      //En la segunda vuelta 1ro contra 1ro (ganador Oro, perdedor, plata)
      //2do contra 3ro (Ganador bronce, perdedor 5to) 
      //3ro contra 2do (Ganador bronce, perdedor 5to)

    }else if($competidores >= 25 && $competidores <= 48){

    }else if($competidores >= 49 && $competidores <= 96){

    }
       
    }


    public function cambiarEstado($id){

      try{
        $sql = "SELECT * FROM competidor WHERE CI = :id";
        $insert = $this->conexion->prepare($sql);
        $insert->bindParam(':id', $id, PDO::PARAM_INT);
        $arrData = array($insert);
        $resInsert = $insert->execute(); 
      }catch(PDOException $ex){
        echo "Ocurrio un error<br>";
        echo $ex->getMessage();
        exit;
      }
      foreach ($insert as $row){
        if($row['Estado'] == "calificar"){

          $actualizar = "UPDATE competidor set Estado= 'calificando' WHERE CI='".$row['CI']."'";
          $stmt = $this->conexion->prepare($actualizar);
          $stmt->execute();
        }
      }

}

  public function seleccionarCompetidor($id,$puntaje){

    try{
      $sql = "SELECT * FROM competidor WHERE CI = :id";
      $insert = $this->conexion->prepare($sql);
      $insert->bindParam(':id', $id, PDO::PARAM_INT);
      $arrData = array($insert);
      $resInsert = $insert->execute(); 
    }catch(PDOException $ex){
      echo "Ocurrio un error<br>";
      echo $ex->getMessage();
      exit;
    }
    
    echo '<div class="tanteador"><table border=1>';
    echo '<tr><th>Cedula</th><th>Nombre</th><th>Puntaje</th></tr>';
    foreach ($insert as $row){
        echo '<tr>
                <td>'.$row['CI'].'</td>
                <td>'.$row['Nombre'].'</td>
                <td>'.$puntaje.'</td>';
        
    }
    echo '</table></div>';

  }

}
?>