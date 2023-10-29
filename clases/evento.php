<?php
    require_once("../conexion/conexion.php");

    class Evento extends Conexion {
        private $idTorneo;
        private $ci;
        private $idG;
        private $etapa;
        private $color;
        private $edad;
        private $sexo;
        private $tipo;
        private $idKata;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertarEvento(int $idTorneo, int $ci, int $idG, string $etapa, string $color, string $edad, string $sexo, string $tipo, int $idKata){

            $this->idTorneo = $idTorneo;
            $this->ci = $ci;
            $this->idG = $idG;
            $this->etapa = $etapa;
            $this->color = $color;
            $this->edad = $edad;
            $this->sexo = $sexo;
            $this->tipo = $tipo;
            $this->idKata = $idKata;

            $sql = "INSERT INTO evento(IdTorneo,CI,IdG,Etapa,Color,Edad,Sexo,Tipo,IdKata) VALUES(?,?,?,?,?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->idTorneo,$this->ci,$this->idG,$this->etapa,$this->color,$this->edad,$this->sexo,$this->tipo,$this->idKata);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }
        
        public function selectDeKata(){

            try{
                $sql = "SELECT * FROM kata";
                $insert = $this->conexion->prepare($sql);
                $arrData = array($insert);
                $resInsert = $insert->execute(); 
            }catch(PDOException $ex){
                echo "Ocurrio un error<br>";
                echo $ex->getMessage();
                exit;
            }
               
            foreach ($insert as $row){
                echo '
                <option value="'.$row['IdKata'].'">'.$row['IdKata'].' | '.$row['Nombre'].'</option>';
                 
            }
        }


        public function categoriaTorneo($id) {
            $consulta = "SELECT Categoria, Sexo FROM torneo WHERE IdTorneo = :id";
        
            try {
                $stmt = $this->conexion->prepare($consulta);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado como un array asociativo
                if ($resultado) {
                    $categoria = $resultado['Categoria']; // Almacenamos la Categoría en una variable
                    $sexo = $resultado['Sexo']; // Almacenamos el Género en otra variable
                    return [$categoria, $sexo]; // Devolvemos un array con ambos valores
                } else {
                    return null; // Si no se encontró ningún resultado, puedes devolver null o algún otro valor por defecto
                }
            } catch (PDOException $ex) {
                echo "Ocurrió un error<br>";
                echo $ex->getMessage();
                return false;
            }
        }


        public function mejorCompetidor(){ 
            
                try {
    
                // Consulta SQL para obtener el IDE del competidor con el puntaje más alto en la tabla "califica"
                $queryMejorCompetidor = "SELECT IdE, SUM(Puntaje) AS TotalPuntaje
                                        FROM califica
                                        GROUP BY IdE
                                        ORDER BY TotalPuntaje DESC
                                        LIMIT 1"; // Obtiene el competidor con el puntaje más alto
            
                $stmtMejorCompetidor = $this->conexion->prepare($queryMejorCompetidor);
                $stmtMejorCompetidor->execute();
                $row = $stmtMejorCompetidor->fetch(PDO::FETCH_ASSOC);
            
                $mejorCompetidorIdE = $row['IdE'];
                $mejorCompetidorPuntaje = $row['TotalPuntaje'];
            
                // Consulta SQL para obtener el valor del atributo "CI" de la tabla "evento" del competidor con el puntaje más alto
                $queryCI = "SELECT CI FROM evento WHERE IdE = :competidorIdE";
                $stmtCI = $this->conexion->prepare($queryCI);
                $stmtCI->bindParam(':competidorIdE', $mejorCompetidorIdE);
                $stmtCI->execute();
                $eventoRow = $stmtCI->fetch(PDO::FETCH_ASSOC);
            
                $CI = $eventoRow['CI'];
                
                // Consulta SQL para obtener el puntaje más alto
                $maxQuery = "SELECT MAX(Puntaje) AS MaxPuntaje FROM califica WHERE IdE = :competidor";
                $maxStmt = $this->conexion->prepare($maxQuery);
                $maxStmt->bindParam(':competidor', $mejorCompetidorIdE);
                $maxStmt->execute();
                $maxRow = $maxStmt->fetch(PDO::FETCH_ASSOC);
                $maxPuntaje = $maxRow['MaxPuntaje'];
            
                // Consulta SQL para obtener el puntaje más bajo
                $minQuery = "SELECT MIN(Puntaje) AS MinPuntaje FROM califica WHERE IdE = :competidor";
                $minStmt = $this->conexion->prepare($minQuery);
                $minStmt->bindParam(':competidor', $mejorCompetidorIdE);
                $minStmt->execute();
                $minRow = $minStmt->fetch(PDO::FETCH_ASSOC);
                $minPuntaje = $minRow['MinPuntaje'];
            
                $mejorCompetidorPuntaje = $mejorCompetidorPuntaje - ($maxPuntaje + $minPuntaje);
            
                return array("CI" => $CI, "MejorCompetidorPuntaje" => $mejorCompetidorPuntaje);
            
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

       
    }

    
?>