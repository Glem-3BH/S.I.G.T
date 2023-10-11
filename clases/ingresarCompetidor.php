<?php
    require_once("../conexion/conexion.php");

    class Competidor extends Conexion {
        private $ci;
        private $nombre;
        private $sexo;
        private $fnac;
        private $idE;
        private $idT;
        private $estado;
        private $conexion;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }

        public function insertarCompetidor(string $ci, string $nombre, string $sexo, string $fnac, int $idE, int $idT, string $estado){

            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->sexo = $sexo;
            $this->fnac = $fnac;
            $this->idE = $idE;
            $this->idT = $idT;
            $this->estado = $estado;

            $sql = "INSERT INTO competidor(CI,Nombre,Sexo,F_Nac,IdEsc,IdTorneo,estado) VALUES(?,?,?,?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->ci,$this->nombre,$this->sexo,$this->fnac,$this->idE,$this->idT,$this->estado);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }
        

    }

    
?>
