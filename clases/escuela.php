<?php
 require_once("../conexion/conexion.php");

 class Escuela extends Conexion {
    
     private $nombre;
     private $localidad;
  
     public function __construct(){
         $this->conexion = new Conexion();
         $this->conexion = $this->conexion->connect();
     }

     public function insertarEscuela(string $nombre, string $localidad){

        
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        

        $sql = "INSERT INTO escuela(Nombre,localidad) VALUES(?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->localidad);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }

    public function eliminarEscuela($id) {
        $consulta = "DELETE FROM escuela WHERE IdEsc = :id";
        
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
}
?>