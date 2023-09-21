<?php
    require_once("../conexion/conexion.php");

    class Competidor extends Conexion {
        private $ci;
        private $nombre;
        private $sexo;
        private $fnac;
        private $idE;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertarCompetidor(string $ci, string $nombre, string $sexo, string $fnac, int $idE){

            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->sexo = $sexo;
            $this->fnac = $fnac;
            $this->idE = $idE;

            $sql = "INSERT INTO competidor(CI,Nombre,Sexo,F_Nac,IdEsc) VALUES(?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->ci,$this->nombre,$this->sexo,$this->fnac,$this->idE);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }
        

    }

    
?>
