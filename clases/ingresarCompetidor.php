<?php
    require_once("../conexion/conexion.php");

    class Competidor extends Conexion {
        private $ci;
        private $idE;
        private $nombre;
        private $sexo;
        private $fnac;
        private $edad;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertarCompetidor(string $ci, int $idE, string $nombre, string $sexo, string $fnac, string $edad){

            $this->ci = $ci;
            $this->idE = $idE;
            $this->nombre = $nombre;
            $this->sexo = $sexo;
            $this->fnac = $fnac;
            $this->edad = $edad;

            $sql = "INSERT INTO competidor(CI,IdE,nombre,sexo,Fnac,Edad) VALUES(?,?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->ci,$this->idE,$this->nombre,$this->sexo,$this->fnac,$this->edad);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

    }

    
?>
