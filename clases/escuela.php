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

    public function listarEscuela(){

        try{
            $sql = "SELECT * FROM escuela";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
        echo '<div class="listakatas">
                <table border=1>
                <caption>Listado de Escuelas</caption>';
        echo '<thead><tr><th>ID</th><th>Nombre</th><th>Localidad</th><th colspan="2">Acciones</th></tr></thead>
                <tbody>';
        foreach ($insert as $row){
            echo '<tr>
                    <td>'.$row['IdEsc'].'</td>
                    <td>'.$row['Nombre'].'</td>
                    <td>'.$row['localidad'].'</td>
                    <td>

                    <a href="eliminarEscuela.php?id='.$row['IdEsc'].'">Eliminar</a>
                        
                    </td>
                    <td>
                    <a href="modificarEscuela.php?id='.$row['IdEsc'].'">Editar</a>
                    </td>
                  </tr>';
             
        }
        echo '<tbody>
        </table>';
        
    }


    public function getEscuela($id){

        try{
            $sql = "SELECT * FROM escuela WHERE IdEsc = :id";
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
            echo '<form action="actualizarEscuela.php" method="GET" class="formularios">
            <input type="hidden" name="id" value="'.$row['IdEsc'].'">
            <label >Nombre</label>
            <input type="text" name="nombre" value="'.$row['Nombre'].'" required>
            <label >Localidad</label>
            <input type="text" name="localidad" value="'.$row['localidad'].'" required>
            <input type="submit" name="Ingresar">
        </form>';
             
        }
        
    }

    public function setEscuela(string $idEsc, string $nombre, string $localidad){

        $actualizar = "UPDATE escuela set Nombre=:nombre, localidad=:localidad WHERE IdEsc=:IdEsc";

        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bindParam(':IdEsc', $idEsc, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $localidad, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function selectDeEscuelas(){

        try{
            $sql = "SELECT * FROM escuela";
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
            <option value="'.$row['IdEsc'].'">'.$row['Nombre'].' | '.$row['localidad'].'</option>';
             
        }
    }
    
}
?>