<?php 
require_once("../conexion/conexion.php");

class Juez extends Conexion {

    private $conexion;
   
    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }


    public function calificando() {
        try {
            // Preparar la consulta SQL
            $consulta = $this->conexion->prepare("SELECT * FROM competidor WHERE Estado = 'calificando'");
            $consulta->execute();
            $resultado = $consulta->fetchColumn();

            if($resultado > 0){
                return true;
            }
        } catch (PDOException $e) {
            echo 'Error al realizar la consulta: ' . $e->getMessage();
            return false;
        }
    }

    public function consultarEstado() {
        try {
            $sql = "SELECT evento.*, competidor.Nombre AS NombreCompetidor, kata.Nombre AS NombreKata, escuela.Nombre AS NombreEscuela
                    FROM evento
                    INNER JOIN competidor ON evento.CI = competidor.CI
                    INNER JOIN kata ON evento.IdKata = kata.IdKata
                    INNER JOIN escuela ON competidor.IdEsc = escuela.IdEsc
                    WHERE competidor.Estado = 'calificando'";
    
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
    
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $resultados;
        } catch (PDOException $ex) {
            echo "Ocurrió un error:<br>";
            echo $ex->getMessage();
            exit;
        }
    }

    public function calificar($idj,$idE,$idkata,$puntaje){

        $this->idj = $idj;
        $this->idE = $idE;
        $this->idkata = $idkata;
        $this->puntaje = $puntaje;
        

        $sql = "INSERT INTO califica(IdJ,IdE,IdKata,Puntaje) VALUES(?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->idj,$this->idE,$this->idkata,$this->puntaje);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }

    public function calificado($idevento){
        $contador=0;
        try{
            $sql = "SELECT * FROM califica WHERE IdE = :idevento";
            $insert = $this->conexion->prepare($sql);
            $insert->bindParam(':idevento', $idevento, PDO::PARAM_INT);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
          }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
          }

        foreach ($insert as $row){
            $contador++;
        }

        return $contador;
    }
        

  public function cambioDeEstado($id){

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
        if($row['Estado'] == "calificando"){

          $actualizar = "UPDATE competidor set Estado= 'calificado' WHERE CI='".$row['CI']."'";
          $stmt = $this->conexion->prepare($actualizar);
          $stmt->execute();
        }
      }
  }
}




?>