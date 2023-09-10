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
        echo '<tr><th>Cedula</th><th>Nombre</th><th>Genero</th><th>F.Nacimiento</th><th>Id Escuela</th></tr>';
        foreach ($insert as $row){
            echo '<tr><td>'.$row['CI'].'</td><td>'.$row['Nombre'].'</td><td>'.$row['Sexo'].'</td><td>'.$row['F_Nac'].'</td><td>'.$row['IdEsc'].'</td></tr>';
             
        }
        echo '</table>';
        
    }
}

?>