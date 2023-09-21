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

}

?>