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
                    INNER JOIN escuela ON evento.IdE = escuela.IdEsc
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
}




?>