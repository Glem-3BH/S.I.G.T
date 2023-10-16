<?php
include_once("../conexion/conexion.php");
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
        echo '<table border=1>';
        echo '<tr><th>Cedula</th><th>Nombre</th><th>Genero</th><th>F.Nacimiento</th><th>Id Escuela</th><th colspan="2">Acciones</th></tr>';
        foreach ($insert as $row){
            echo '<tr>
                    <td>'.$row['CI'].'</td>
                    <td>'.$row['Nombre'].'</td>
                    <td>'.$row['Sexo'].'</td>
                    <td>'.$row['F_Nac'].'</td>
                    <td>'.$row['IdEsc'].'</td>
                    <td>
    
                        <a href="eliminarCompetidor.php?competidor='.$row['CI'].'">Eliminar</a>
                        
                    </td>
                    <td>
                    <a href="modificarCompetidor.php?id='.$row['CI'].'">Editar</a>
                    </td>
                  </tr>';
             
        }
        echo '</table>';
        
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
            echo '<section class="vh-10 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                      <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Ingrese nuevo competidor manualmente:</h3>
                      
                      <form action="actualizarCompetidor.php" method="GET">
                        <div class="row">
                          <div class="col-md-12 mb-4">
          
                            <div class="form-outline">
                              <label class="form-label" for="name">Nombre Completo</label>
                              <input type="text" id="name" class="form-control form-control-lg" name="nombre" value="'.$row['Nombre'].'"/>
                            </div>
    
          
                          </div>
                        </div>
          
                        <div class="row">
                          <div class="col-md-6 mb-4 d-flex align-items-center">
          
                            <div class="form-outline datepicker w-100">
                              <label for="birthdayDate" class="form-label">Fecha de Nacimiento</label>
                              <input type="date" class="form-control form-control-lg" id="birthdayDate" name="fnac" value="'.$row['F_Nac'].'"/>
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4">
          
                            <h6 class="mb-2 pb-1">Género: </h6>
          
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="sexo" id="femaleGender"
                                value="F" checked />
                              <label class="form-check-label" >Mujer</label>
                            </div>
          
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="sexo" id="maleGender"
                                value="M" />
                              <label class="form-check-label" >Hombre</label>
                            </div> 
                          </div>
                        </div>
                          <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                              <label class="form-label" for="ci">C.I.</label>
                              <input type="tel" id="ci" name="ci" class="form-control form-control-lg" value="'.$row['CI'].'" />
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                              <label class="form-label" for="ci" >Escuela</label>
                              <input type="number" id="ci" name="idE" class="form-control form-control-lg" value="'.$row['IdEsc'].'"/>
                            </div>
                          </div>
                        </div>
                          <input class="btn btn-danger btn-lg" type="submit" value="actualizar" name="Actualizar" />
                        </div>
          
                      </form>
    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>';
             
        }
        
    }

    public function setCompetidor(string $ci, string $nombre, string $sexo, string $fnac, int $idE){

        $actualizar = "UPDATE competidor set Nombre=:nombre, Sexo=:sexo, F_Nac=:fnac, IdEsc=:idE WHERE CI=:ci";

        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bindParam(':ci', $ci, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':fnac', $fnac, PDO::PARAM_STR);
        $stmt->bindParam(':idE', $idE, PDO::PARAM_STR);

        $stmt->execute();

    }


    
    public function listarParaTorneo($id){
      $competidores = 0;
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

      $pool;
      $numero = random_int(1, 2);
        if($numero == 1){
          $pool = "AKA";
        }else{
          $pool = "AO";
        }
      echo '<table border=1>';
      echo '<tr><th>Cedula</th><th>Nombre</th><th>Genero</th><th>F.Nacimiento</th><th>Id Escuela</th><th>Pool</th><th>Acciones</th><th>Estado</th></tr>';
      foreach ($insert2 as $row){
          echo '<tr>
                  <td>'.$row['CI'].'</td>
                  <td>'.$row['Nombre'].'</td>
                  <td>'.$row['Sexo'].'</td>
                  <td>'.$row['F_Nac'].'</td>
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

}
?>